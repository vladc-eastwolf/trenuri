<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::beginForm(['ticket/bulk'], 'post'); ?>

    <div class="ticket-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <div style="padding-bottom: 20px">
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
            'options' => ['style' => 'width:max'],
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

                        'style' => 'width:100px; '
                    ],
                ],
                'email:email',
                'user_id',
                [
                    'attribute' => 'sales_time',
                    'label' => 'Sold At',
                    'options' => ['style' => 'width:100px']
                ],
                [
                    'attribute' => 'composition_id',
                    'label' => 'Composition',
                    'value' => function ($model) {
                        return $model->composition->train->type . $model->composition->train->number;
                    }
                ],
                [
                    'attribute' => 'journey_date',
                    'label' => 'Date',
                    'options' => ['style' => 'width:90px']
                ],
                [
                    'attribute' => 'departure_station_id',
                    'label' => 'Departure Station',
                    'value' => function ($model) {
                        return $model->departureStation->name;
                    },
                ],
                [
                    'attribute' => 'arrival_station_id',
                    'label' => 'Arrival Station',
                    'value' => function ($model) {
                        return $model->arrivalStation->name;
                    }
                ],
                ['attribute'=>'departure_time'],
                ['attribute'=>'arrival_time'],
                ['attribute'=>'distance'],
                [
                    'attribute' => 'is_first_class',
                    'label' => 'First Class'
                ],
                [
                    'attribute' => 'is_second_class',
                    'label' => 'Second Class'
                ],
                [
                    'attribute' => 'seat_reserved',
                    'label' => 'Seat Reserved'
                ],
                'price',

            ],
        ]); ?>


    </div>
<?php Html::endForm() ?>