<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $full_name
 * @property int|null $status
 * @property string $created_at
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    public $current_password;
    public $new_password;
    public $confirm_password;

    public $authKey;
//    public $accessToken;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'full_name', 'status', 'password'], 'required'],
            [['status'], 'integer'],
            ['username', 'unique'],
            [['created_at'], 'safe'],
            [['username', 'password', 'full_name'], 'string', 'max' => 255],
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
            'password' => 'Password',
            'full_name' => 'Full Name',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
            return static::findOne(['access_token' => $token]);
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {
        return $this->authKey;
    }
    public function validateAuthKey($authKey)
    {
        return $this->authKey=== $authKey;
    }
    public static function findByUsername($username){
        return static::findOne(['username' => $username]);
    }
    public function validatePassword($password){
        if (Yii::$app->security->validatePassword($password, $this->password)) {
            return true;
        }
        else {
            return false;
        }
    }
}
