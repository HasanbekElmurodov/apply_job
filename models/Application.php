<?php

namespace app\models;

use Yii;

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
class Application extends \yii\db\ActiveRecord
{
    const STATUS_NEW = 1;
    const STATUS_INTERVIEW = 2;
    const STATUS_ACCEPTED = 3;
    const STATUS_REJECTED = 4;



    public static function getString($role)
    {
        if ($role == self::STATUS_NEW)  return "yangi";
        if ($role == self::STATUS_INTERVIEW)  return "intervyu belgilangan";
        if ($role == self::STATUS_ACCEPTED)  return "qabul qilingan";
        if ($role == self::STATUS_REJECTED)  return "qabul qilinmagan";
        return "Noma'lum";
    }

    public function getStatusList(){
        return [
            self::STATUS_NEW => self::getString(self::STATUS_NEW),
            self::STATUS_INTERVIEW => self::getString(self::STATUS_INTERVIEW),
            self::STATUS_ACCEPTED => self::getString(self::STATUS_ACCEPTED),
            self::STATUS_REJECTED => self::getString(self::STATUS_REJECTED),
        ];
    }
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
            [['full_name', 'address', 'country_of_origin', 'email', 'phone_number', 'age', 'status'], 'required'],
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

    public function getInterview(){
        return $this->hasOne(Interview::className(), ['applicant_id' => 'id']);
    }

}
