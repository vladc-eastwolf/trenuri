<?php

use backend\models\Composition;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Trip;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Operates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'composition_id')->dropDownList(ArrayHelper::map(Composition::find()->asArray()->all(), 'id', 'id'), ['prompt' => 'Select Composition'])->label('Composition') ?>

    <?= $form->field($model, 'trip_id')->dropDownList(ArrayHelper::map(Trip::find()->asArray()->all(), 'id', 'id'), ['prompt' => 'Select Trip'])->label('Trip') ?>

    <?= $form->field($model, 'date_from')->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Arrival At'],
            'pluginOptions' => [
                'showMeridian' => false,
                'minuteStep' => 1,
                'defaultTime' => false,

            ]
        ])
    ?>

    <?= $form->field($model, 'date_to')->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Arrival At'],
            'pluginOptions' => [
                'showMeridian' => false,
                'minuteStep' => 1,
                'defaultTime' => false,

            ]
        ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
