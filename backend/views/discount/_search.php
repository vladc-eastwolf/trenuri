<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DiscountSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discount-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'student') ?>

    <?= $form->field($model, 'schoolboy') ?>

    <?= $form->field($model, 'retired') ?>

    <?php  echo $form->field($model, 'identity_card') ?>

    <?php  echo $form->field($model, 'size') ?>

    <?php  echo $form->field($model, 'extension') ?>

    <?php  echo $form->field($model, 'mime_type') ?>

    <?php  echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
