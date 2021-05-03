<?php

namespace app\modules\restapi\models;

use Yii;

/**
 * This is the model class for table "interview".
 *
 * @property int $id
 * @property int|null $examiner_id
 * @property int|null $applicant_id
 * @property string|null $interview_time
 */
class Interview extends \app\models\Interview
{
    /**
     * {@inheritdoc}
     * @return \app\modules\restapi\models\query\InterviewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\restapi\models\query\InterviewQuery(get_called_class());
    }
}
