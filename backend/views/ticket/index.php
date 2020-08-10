<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ticket', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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

                    'style' => 'width:100px; '
                ],
            ],
            'email:email',
            'user_id',
            [
                'attribute' => 'sales_time',
                'label' => 'Sold At',
            ],
            'composition_id',
            [
                'attribute' => 'journey_date',
                'label' => 'Date'
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>


</div>
