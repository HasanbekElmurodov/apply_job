<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$form = ActiveForm::begin([
    'id' => 'application-form',
    'options' => ['class' => 'form-horizontal'],
]);
echo $form->field($model, 'full_name');
echo $form->field($model, 'address');
echo $form->field($model, 'country_of_origin');
echo $form->field($model, 'email')->input('email');
echo $form->field($model, 'phone_number');
echo $form->field($model, 'age');
?>
<div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php
$form = ActiveForm::end();
?>
