<?php

namespace app\modules\restapi\models;

use Yii;

/**
 * This is the model class for table "examiner".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property int|null $status
 */
class Examiner extends \app\models\Examiner
{
    /**
     * {@inheritdoc}
     * @return \app\modules\restapi\models\query\ExaminerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\restapi\models\query\ExaminerQuery(get_called_class());
    }
}
