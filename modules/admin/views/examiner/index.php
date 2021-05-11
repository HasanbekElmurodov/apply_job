<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\ExaminerSearch */
/* @var $model app\models\Examiner */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Examiners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examiner-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Examiner', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'username',
            'email:email',
//            'status',
            [
                    'attribute' => 'status',
                'value' => function ($model){
        return $model->status;
                },
                'filter' => ['1' => 'Active', '2' => 'Inactive'],
],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
