<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TripSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'line_id') ?>

    <?= $form->field($model, 'operational_interval_id') ?>

    <?= $form->field($model, 'train_id') ?>

    <?= $form->field($model, 'departure_time') ?>

    <?php // echo $form->field($model, 'arrival_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
