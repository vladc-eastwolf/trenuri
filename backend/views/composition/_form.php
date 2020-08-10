<?php

use backend\models\Train;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Operator;

/* @var $this yii\web\View */
/* @var $model backend\models\Composition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="composition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'train_id')->dropDownList(ArrayHelper::map(Train::find()->asArray()->all(), 'id', 'number', 'type'), ['prompt' => 'Select Train'])->label('Train') ?>

    <?= $form->field($model, 'seats_first_class')->textInput() ?>

    <?= $form->field($model, 'seats_second_class')->textInput() ?>

    <?= $form->field($model, 'additional_capacity')->textInput() ?>

    <?= $form->field($model, 'operator_id')->dropDownList(ArrayHelper::map(Operator::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Operator'])->label('Operator') ?>


    <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
