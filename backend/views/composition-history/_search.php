<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompositionHistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="composition-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'composition_id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'seats_first_class') ?>

    <?= $form->field($model, 'seats_second_class') ?>

    <?= $form->field($model, 'additional_capacity') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'operator_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
