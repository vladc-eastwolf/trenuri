<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Operator;
use backend\models\Station;

/* @var $this yii\web\View */
/* @var $model backend\models\Line */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="line-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'ex: Departure Station-Arrival Station']) ?>

    <?= $form->field($model, 'operator_id')->dropDownList(ArrayHelper::map(Operator::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Operator'])->label('Operator') ?>

    <?= $form->field($model, 'departure_station_id')->dropDownList(ArrayHelper::map(Station::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Departure Station'])->label('Departure Station') ?>

    <?= $form->field($model, 'arrival_station_id')->dropDownList(ArrayHelper::map(Station::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Arrival Station'])->label('Location') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
