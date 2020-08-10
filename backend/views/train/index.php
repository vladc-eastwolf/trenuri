<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TrainSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trains';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::beginForm(['train/bulk'], 'post'); ?>
    <div class="train-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <div style="padding-bottom: 50px">
            <div style="float: left">
                <?= Html::a('Create Train', ['create'], ['class' => 'btn btn-success']) ?>
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
                'type',
                'number',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                    'options' => ['style' => 'width:30px']
                ],
            ],
        ]); ?>


    </div>
<?= Html::endForm() ?>