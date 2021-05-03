<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interview".
 *
 * @property int $id
 * @property int|null $examiner_id
 * @property int|null $applicant_id
 * @property string|null $interview_time
 */
class Interview extends \yii\db\ActiveRecord
{
    /**
     * @var mixed|null
     */

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interview';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['examiner_id', 'applicant_id'], 'integer'],
            [['examiner_id', 'applicant_id', 'interview_time'], 'required'],
            [['examiner_id', 'applicant_id'], 'default', 'value' => '0'],
            [['examiner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Examiner::className(), 'targetAttribute' => ['examiner_id' => 'id']],
            [['applicant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Application::className(), 'targetAttribute' => ['applicant_id' => 'id']],
            [['interview_time'], 'myFunction'],
        ];
    }
    public function myFunction($attribute){
//        $this->addError($attribute, 'You have already submitted');
        $interview_time = $this->interview_time;
        $current_time = date('Y-m-d');
        if($interview_time < $current_time){
            $this->addError($attribute, "Bugungi kundan keyingi vaqt kiriting");
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'examiner_id' => 'Examiner Name',
            'applicant_id' => 'Applicant Name',
            'interview_time' => 'Interview Time',
        ];
    }

    public function getApplication(){
        return $this->hasOne(Application::className(), ['id' => 'applicant_id']);
    }

    public function getExaminer(){
        return $this->hasOne(Examiner::className(), ['id' => 'examiner_id']);
    }


}
