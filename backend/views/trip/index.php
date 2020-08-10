<?php

use kartik\datetime\DateTimePicker;
use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TripSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trips';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::beginForm(['trip/bulk'], 'post'); ?>
    <div class="trip-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <div style="padding-bottom: 50px">
            <div style="float: left">
                <?= Html::a('Create Trip', ['create'], ['class' => 'btn btn-success']) ?>
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
                    'attribute' => 'line_id',
                    'label' => 'Line',
                    'value' => function ($model) {
                        return 'ID:' . $model->line->id . '-' . $model->line->name;
                    }
                ],
                [
                    'attribute' => 'operational_interval_id',
                    'header' => 'Operational Interval' . " " . Html::a('', '', [
                            'class' => 'glyphicon glyphicon-info-sign',
                            'data-toggle' => 'modal',
                            'data-target' => '#your-modal',
                        ]),
                    'value' => function ($model) {
                        return $model->operationalInterval->name;
                    }
                ],
                [
                    'attribute' => 'train_id',
                    'label' => 'Train',
                    'value' => function ($model) {
                        return $model->train->type . $model->train->number;
                    }
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
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}',
                    'options' => ['style' => 'width:30px']
                ],
            ],
        ]); ?>

    </div>
<?php Modal::begin([
    'header' => '<h2>Operational Interval </h2>',
    'id' => 'your-modal',
    'size' => 'modal-lg'
]); ?>

    <table style="width:100%">

        <tr>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th>Saturday</th>
            <th>Sunday</th>
        </tr>
        <?php foreach ($model2 as $mod2) { ?>
            <tr>

                <td><?= $mod2->name ?></td>
                <td><?= $mod2->start_date ?></td>
                <td><?= $mod2->end_date ?></td>
                <td><?= $mod2->monday ?></td>
                <td><?= $mod2->tuesday ?></td>
                <td><?= $mod2->wednesday ?></td>
                <td><?= $mod2->thursday ?></td>
                <td><?= $mod2->friday ?></td>
                <td><?= $mod2->saturday ?></td>
                <td><?= $mod2->sunday ?></td>

            </tr>
        <?php } ?>
    </table>
<?php Modal::end(); ?>

<?php Html::endForm() ?>