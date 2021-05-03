<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Examiner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examiner-form row">

<div class="col-lg-6">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [
                '1' => 'active',
                '2' => 'inactive'
            ],
        ['prompt' => 'Tanlang']
    ); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

</div>
    <?php ActiveForm::end(); ?>

</div>
