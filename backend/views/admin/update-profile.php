<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title='Update Profile';

?>
<h1 style="text-align: center"><?= Html::encode($this->title)?></h1>
<div class="box" style="width: 500px; height: 250px; background-color: #E9E9E9; border-radius: 15px; display: block; margin-left: auto; margin-right: auto;">
    <div style="padding-top: 20px; padding-left: 10px; padding-right: 10px; padding-bottom: 10px">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'firstname', ['inputOptions' => ['placeholder' => 'Firstname', 'class' => 'form-control input-lg']])->label(false); ?>
        <?= $form->field($model, 'lastname', ['inputOptions' => ['placeholder' => 'Lastname', 'class' => 'form-control input-lg']])->label(false); ?>
        <?= $form->field($model, 'phone', ['inputOptions' => ['placeholder' => 'Phone', 'class' => 'form-control input-lg']])->label(false); ?>

        <?= Html::submitButton('Update', ['class' => 'btn btn-success']); ?>

        <?php $form = ActiveForm::end(); ?>

    </div>
</div>