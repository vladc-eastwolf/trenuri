<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Compositions';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::beginForm(['composition/bulk'], 'post'); ?>
    <div class="composition-index">
        <h1><?= Html::encode($this->title) ?></h1>

        <div style="padding-bottom: 50px">
            <div style="float:left">
                <?= Html::a('Create Composition', ['create'], ['class' => 'btn btn-success']) ?>
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
                    'attribute' => 'train_id',
                    'label' => 'Train',
                    'value' => function ($model) {
                        return $model->train->type . $model->train->number;
                    }
                ],
                'seats_first_class',
                'seats_second_class',
                'additional_capacity',
                'update_time',
                [
                    'attribute' => 'operator_id',
                    'label' => 'Operator',
                    'value' => function ($model) {
                        return $model->operator->name;
                    }
                ],
                'description',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                    'options' => ['style' => 'width:30px']
                ],
            ],
        ]); ?>


    </div>
<?php Html::endForm() ?>