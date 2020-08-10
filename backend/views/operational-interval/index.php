<?php

use kartik\date\DatePicker;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OperationalIntervalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operational Intervals';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::beginForm(['operational-interval/bulk'], 'post'); ?>
    <div class="operational-interval-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <div style="padding-bottom: 50px">
            <div style="float: left">
                <?= Html::a('Create Operational Interval', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
            <div style="float:right">
                <?= Html::submitButton('Delete', [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ]]); ?>
            </div>

        </div>


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'options' => ['style' => 'width:30px']
                ],
                [
                    'class' => 'yii\grid\CheckboxColumn',
                    'options' => ['style' => 'width:30px']
                ],

                [
                    'attribute' => 'name',
                    'contentOptions' => [
                        'style' => 'width:175px;'
                    ],
                ],
                [
                    'attribute' => 'start_date',
                    'format' => ['date', 'php:d/m/Y']
                ],
                [
                    'attribute' => 'end_date',
                    'format' => ['date', 'php:d/m/Y']
                ],
                'monday',
                'tuesday',
                'wednesday',
                'thursday',
                'friday',
                'saturday',
                'sunday',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                    'options' => ['style' => 'width:30px']
                ],
            ],
        ]); ?>


    </div>
<?php Html::endForm() ?>