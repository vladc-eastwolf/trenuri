<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stations';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::beginForm(['operator/bulk'], 'post'); ?>
    <div class="station-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <div style="padding-bottom: 50px">
            <div style="float:left">
                <?= Html::a('Create Station', ['create'], ['class' => 'btn btn-success']) ?>
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
                    'attribute' => 'location_id',
                    'label' => 'Location',
                    'value' => function ($model) {
                        return $model->location->name;
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
<?php Html::endForm(); ?>