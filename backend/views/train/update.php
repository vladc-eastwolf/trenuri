<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Train */

$this->title = 'Update Train: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Trains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="train-update">
    <?php $items = [
        1 => 'IR',
        2 => 'R',
        3 => 'INTERNATIONAL'
    ] ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList($items) ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
