<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TicketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'sales_time') ?>

    <?php // echo $form->field($model, 'composition_id') ?>

    <?php // echo $form->field($model, 'journey_date') ?>

    <?php // echo $form->field($model, 'departure_station_id') ?>

    <?php // echo $form->field($model, 'arrival_station_id') ?>

    <?php // echo $form->field($model, 'is_first_class') ?>

    <?php // echo $form->field($model, 'is_second_class') ?>

    <?php // echo $form->field($model, 'seat_reserved') ?>

    <?php // echo $form->field($model, 'price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
