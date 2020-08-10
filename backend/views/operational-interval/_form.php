<?php

use backend\models\Station;
use kartik\date\DatePicker;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OperationalInterval */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operational-interval-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->widget(DatePicker::className(),
        [
            'options' => ['placeholder' => 'Start'],
            'size' => 'lg',
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd'
            ]
        ]) ?>

    <?= $form->field($model, 'end_date')->widget(DatePicker::className(),
        [
            'options' => ['placeholder' => 'End'],
            'size' => 'lg',
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd'
            ]
        ]) ?>

<table id="tabel">
    <tr>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
    </tr>
    <tr>
        <td><?= $form->field($model, 'monday')->checkbox(['label'=>''])->label(false) ?></td>
        <td> <?= $form->field($model, 'tuesday')->checkbox(['label'=>''])->label(false) ?></td>
        <td> <?= $form->field($model, 'wednesday')->checkbox(['label'=>''])->label(false) ?></td>
        <td> <?= $form->field($model, 'thursday')->checkbox(['label'=>''])->label(false) ?></td>
        <td> <?= $form->field($model, 'friday')->checkbox(['label'=>''])->label(false) ?></td>
        <td> <?= $form->field($model, 'saturday')->checkbox(['label'=>''])->label(false) ?></td>
        <td> <?= $form->field($model, 'sunday')->checkbox(['label'=>''])->label(false) ?></td>
    </tr>
</table>
<br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    #tabel {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #tabel td, #tabel th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #tabel tr:nth-child(even){background-color: #f2f2f2;}

    #tabel th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #00CED1;
        color: white;
    }
</style>
