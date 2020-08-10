<?php

use backend\models\Station;
use backend\models\Trip;
use kartik\time\TimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>
<?php
foreach ($model as $i => $mod) {
    ?>

    <?= $form->field($mod, "[$i]trip_id")->dropDownList(ArrayHelper::map(Trip::find()->asArray()->all(), 'id', 'id'), ['prompt' => 'Select Trip'])->label('Trip') ?>

    <?= $form->field($mod, "[$i]station_id")->dropDownList(ArrayHelper::map(Station::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Station'])->label('Station') ?>

    <?= $form->field($mod, "[$i]station_order")->textInput(['maxlength' => true]) ?>

    <?= $form->field($mod, "[$i]distance")->textInput(['maxlength' => true]) ?>

    <?= $form->field($mod, "[$i]arrival_time")->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Arrival At'],
            'pluginOptions' => [
                'minuteStep' => 1,
                'defaultTime' => false,
            ]
        ])
    ?>
    <?= $form->field($mod, "[$i]departure_time")->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Departure At'],
            'pluginOptions' => [
                'minuteStep' => 1,
                'defaultTime' => false,
            ]
        ])
    ?>
    <?php
}

?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php $form = ActiveForm::end(); ?>

