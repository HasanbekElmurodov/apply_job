<?php

namespace app\modules\restapi\models;

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
 * @property int|null $status
 * @property string $created_at
 */
class Application extends \app\models\Application
{
    public function fields(){
        return ['id','full_name', 'address', 'country_of_origin', 'email', 'phone_number', 'age', 'status'];
    }
    public function extraFields()
    {
        return ['created_at', 'interview'];
    }

    public static function find()
    {
        return new \app\modules\restapi\models\query\ApplicationQuery(get_called_class());
    }
}
