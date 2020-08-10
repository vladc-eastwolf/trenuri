<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Location;

/* @var $this yii\web\View */
/* @var $model backend\models\Station */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="station-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model,'location_id')->dropDownList(ArrayHelper::map(Location::find()->asArray()->all(),'id','name'),['prompt'=>'Choose the Location'])->label('Location') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
