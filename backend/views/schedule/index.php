<?php

use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Schedules';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::beginForm(['schedule/bulk'], 'post'); ?>


<div class="schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div style="padding-bottom: 50px">
        <div style="float:left">
            <?= Html::a('Create Schedule', ['create1'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'trip_id',
                'label' => 'Trip',
                'value' => function ($model) {
                    return $model->trip->id . '-' . $model->trip->line->name;
                },
                'contentOptions' => [

                    'style' => 'width:200px; '
                ],

            ],
            [
                'attribute' => 'station_id',
                'label' => 'Station',
                'value' => function ($model) {
                    return $model->station->name;
                }
            ],
            'station_order',
            'distance',
            [
                'attribute' => 'arrival_time',
                'label' => 'Arrival Time',
                'value' => 'arrival_time',
                'filter' => TimePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'arrival_time',
                    'pluginOptions' => [
                        'minuteStep' => 1,
                        'defaultTime' => false,
                        'disableMousewheel' => true,
                    ]
                ])
            ],
            [
                'attribute' => 'departure_time',
                'label' => 'Departure Time',
                'value' => 'departure_time',
                'filter' => TimePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'departure_time',
                    'pluginOptions' => [
                        'minuteStep' => 1,
                        'defaultTime' => false,
                        'disableMousewheel' => true,
                    ]
                ])
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'options' => ['style' => 'width:30px']
            ],
        ],
    ]) ?>
</div>
<?= Html::endForm(); ?>
