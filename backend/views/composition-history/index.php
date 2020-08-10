<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompositionHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Composition Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="composition-history-index">
    <?= Html::beginForm(['composition-history/bulk'], 'post'); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <div style="padding-bottom: 50px">
        <div style="float: left">
            <?= Html::a('Create Composition History', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'composition_id',
                'header' => 'Composition ID ' . Html::a('', '', [
                        'class' => 'glyphicon glyphicon-info-sign',
                        'data-toggle' => 'modal',
                        'data-target' => '#your-modal',
                    ]),

            ],
            [
                'attribute' => 'train_id',
                'label' => 'Train',
                'value' => function ($model) {
                    return $model->train->type . $model->train->number;
                }
            ]
            ,
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'options' => ['style' => 'width:30px']
            ],
        ],
    ]); ?>


</div>
<?php Html::endForm() ?>


<?php Modal::begin([
    'header' => '<h2>Composition </h2>',
    'id' => 'your-modal',
    'size' => 'modal-lg',
]); ?>

<table style="width:100%">

    <tr>
        <th>ID</th>
        <th>Train ID</th>
        <th>Seats First Class</th>
        <th>Seats Second Class</th>
        <th>Additional Capacity</th>
        <th>Update Time</th>
        <th>Operator</th>
    </tr>
    <?php foreach ($model2 as $mod2) { ?>
        <tr>

            <td><?= $mod2->id ?></td>
            <td><?= $mod2->train->type . $mod2->train->number ?></td>
            <td><?= $mod2->seats_first_class ?></td>
            <td><?= $mod2->seats_second_class ?></td>
            <td><?= $mod2->additional_capacity ?></td>
            <td><?= $mod2->update_time ?></td>
            <td><?= $mod2->operator->name ?></td>

        </tr>
    <?php } ?>

</table>
<?php Modal::end(); ?>
