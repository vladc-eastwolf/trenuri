<?php

use backend\models\Line;
use backend\models\OperationalInterval;
use kartik\time\TimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Train;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Trip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'line_id')->dropDownList(ArrayHelper::map(Line::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Line'])->label('Line') ?>

    <?= $form->field($model, 'operational_interval_id')->dropDownList(ArrayHelper::map(OperationalInterval::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Operational Interval'])->label('Operational Interval' .  Html::a('', '', [
            'class' => 'glyphicon glyphicon-info-sign',
            'data-toggle' => 'modal',
            'data-target' => '#your-modal',
        ])) ?>

    <?= $form->field($model, 'train_id')->dropDownList(ArrayHelper::map(Train::find()->asArray()->all(), 'id', 'number', 'type'), ['prompt' => 'Select Train'])->label('Train') ?>

    <?= $form->field($model, 'departure_time')->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Departure At',],
            'pluginOptions' => [
                'showMeridian' => false,
                'minuteStep' => 1,
            ],
        ])
    ?>


    <?= $form->field($model, 'arrival_time')->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Arrive At'],
            'pluginOptions' => [
                'showMeridian' => false,
                'minuteStep' => 1,
            ],
        ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php Modal::begin([
        'header' => '<h2>Operational Interval </h2>',
        'id' => 'your-modal',
        'size'=>'modal-lg'
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

    <?php ActiveForm::end(); ?>

</div>
