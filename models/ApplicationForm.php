<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $full_name
 * @property string $address
 * @property string $country_of_origin
 * @property string $email
 * @property string $phone_number
 * @property int $age
 * @property string|null $status
 * @property string $created_at
 */
class ApplicationForm extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'address', 'country_of_origin', 'email', 'phone_number', 'age'], 'required'],
            [['age'], 'integer'],
            [['created_at'], 'safe'],
            ['full_name', 'string', 'min' => 5],
            ['address', 'string', 'min' => 10],
            [['email'], 'unique'],
            [['email'], 'email'],
            [['phone_number'], 'unique'],
            ['phone_number', 'string', 'length'=> [13, 13]],
            [['phone_number'], 'match', 'pattern' => '/((\+998)|0)[-]?[0-9]{9}/', 'message' => 'Telefon raqam +998999999999 ko\'rinishida bo\'lishi lozim.']

        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'address' => 'Address',
            'country_of_origin' => 'Country Of Origin',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'age' => 'Age',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
