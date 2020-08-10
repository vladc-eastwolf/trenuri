<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locations';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::beginForm(['location/bulk'], 'post'); ?>
    <div class="location-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <div style="padding-bottom: 50px">
            <div style="float:left">
                <?= Html::a('Create Location', ['create'], ['class' => 'btn btn-success']) ?>
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
                'postal_code',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                    'options' => ['style' => 'width:30px']

                ],
            ],
        ]); ?>


    </div>
<?php Html::endForm(); ?>