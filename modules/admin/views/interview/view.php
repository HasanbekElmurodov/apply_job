<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Interview */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Interviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="interview-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'examiner_id',
//        [
//                'attribute' => 'Examiner Name',
//                'value' => ($model->getExaminer()->username)
//],
            [
                'attribute' => 'examiner.username',
                'format' =>'text',
                'label'=>'Examiner Name',
            ],
//            'applicant_id',
//            [
//                'attribute' => 'Examiner Name',
//                'value' => ($model->getApplication()->fullname)
//            ],
            [
                'attribute' => 'application.full_name',
                'format' =>'text',
                'label'=>'Applicant Name',
            ],
            'interview_time',
        ],
    ]) ?>

</div>