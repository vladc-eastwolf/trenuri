<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Train */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="train-form">
    <?php $items = [
        1 => 'IR',
        2 => 'R',
        3 => 'INTERNATIONAL'
    ] ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList($items, ['prompt' => 'Choose type']) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
