<?php

use yii\grid\SerialColumn;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Operation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            ['attribute' => 'amount',
             'contentOptions' => function ($model) {
                return ['style' => $model->type ? 'background:#d1eeff' : 'background:#ffb3b3'];
             },
            ],
            ['attribute' => 'created_at', 'format' => ['date', 'php:d.m.Y']],
            ['attribute' => 'category_id', 'label' => 'Category', 'value' => 'category.name'],
            ['attribute' => 'type', 'label' => 'Type', 'value' => function ($model) {
                return $model->type ? 'income' : 'consumption';
            }, ],

            ['class' => ActionColumn::class],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
