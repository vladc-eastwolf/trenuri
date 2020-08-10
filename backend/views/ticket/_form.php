<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'sales_time')->textInput() ?>

    <?= $form->field($model, 'composition_id')->textInput() ?>

    <?= $form->field($model, 'journey_date')->textInput() ?>

    <?= $form->field($model, 'departure_station_id')->textInput() ?>

    <?= $form->field($model, 'arrival_station_id')->textInput() ?>

    <?= $form->field($model, 'is_first_class')->textInput() ?>

    <?= $form->field($model, 'is_second_class')->textInput() ?>

    <?= $form->field($model, 'seat_reserved')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
