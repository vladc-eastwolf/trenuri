<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ScheduleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'trip_id') ?>

    <?= $form->field($model, 'station_id') ?>

    <?= $form->field($model, 'station_order') ?>

    <?= $form->field($model, 'distance') ?>

    <?php // echo $form->field($model, 'arrival_time') ?>

    <?php // echo $form->field($model, 'departure_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
