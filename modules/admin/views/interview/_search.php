<?php

use app\models\Application;
use app\models\Examiner;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\InterviewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interview-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'examiner_id')->dropDownList(
        ArrayHelper::map(Examiner::find()->all(), 'id', 'username'),
        ['prompt' => 'Select examiner name']
    )?>

    <?= $form->field($model, 'applicant_id')->dropDownList(
        ArrayHelper::map(Application::find()->all(), 'id', 'full_name'),
        ['prompt' => 'Select applicant name']
    ) ?>

    <?= $form->field($model, 'interview_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
