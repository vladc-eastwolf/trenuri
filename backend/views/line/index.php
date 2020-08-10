<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lines';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::beginForm(['line/bulk'], 'post'); ?>
    <div class="line-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <div style="padding-bottom: 50px">
            <div style="float: left">
                <?= Html::a('Create Line', ['create'], ['class' => 'btn btn-success']) ?>
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

                'name',
                [
                    'attribute' => 'operator_id',
                    'label' => 'Operator',
                    'value' => function ($model) {
                        return $model->operator->name;
                    }
                ],
                [
                    'attribute' => 'departure_station_id',
                    'label' => 'Departure Station',
                    'value' => function ($model) {
                        return $model->departureStation->name;
                    }
                ],
                [
                    'attribute' => 'arrival_station_id',
                    'label' => 'Arrival Station',
                    'value' => function ($model) {
                        return $model->arrivalStation->name;
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                    'options' => ['style' => 'width:30px']
                ],
            ],
        ]); ?>


    </div>
<?php Html::endForm() ?>