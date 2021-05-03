<?php

use app\models\Application;
use app\models\Examiner;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Interview */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interview-form row">
<div class="col-lg-6">



    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'examiner_id')->dropDownList(
        ArrayHelper::map(Examiner::find()->all(), 'id', 'username'),
        ['prompt' => 'Select examiner name']
    )?>

    <?= $form->field($model, 'applicant_id')->dropDownList(
            ArrayHelper::map(Application::find()->all(), 'id', 'full_name'),
        ['prompt' => 'Select applicant name']
    ) ?>

    <?= $form->field($model, 'interview_time')->input('date') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

</div>
