<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "examiner".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property int|null $status
 */
class Examiner extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'examiner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'email','status'], 'required'],
            [['status'], 'integer'],
            [['username', 'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'status' => 'Status',
        ];
    }

    public function getInterviews(){
        return $this->hasMany(Interview::className(), ['examiner_id' => 'id']);
    }
}
