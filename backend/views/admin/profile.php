<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
$this->title='Profile';
?>


<div class="container">
    <div class="row">
        <h1 style="text-align: center"><?= Html::encode($this->title)?></h1>
        <div class="box" style="width: 500px; height: 160px; background-color: #E9E9E9; border-radius: 15px; display: block; margin-left: auto; margin-right: auto;">
            <?= Html::a('',['update-profile','id'=>Yii::$app->user->getId()],['class'=>"col-sm-7 col-xs-6 col-sm-push-6 glyphicon glyphicon-pencil",'style'=>'float:right; padding-top:5px;']) ?>
            <div class="fields" style="padding: 20px 10px 10px 10px; ">


                <div class="col-sm-5 col-xs-6 tital" style="font-size: 19px;">First Name:</div>
                <div class="col-sm-7 col-xs-6" style="text-transform: capitalize" style="font-size: 19px;"><?= $model->firstname; ?></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " style="font-size: 19px;">Last name:</div>
                <div class="col-sm-7 col-xs-6" style="text-transform: capitalize"
                     style="font-size: 19px"><?= $model->lastname; ?></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " style="font-size: 19px;">Phone:</div>
                <div class="col-sm-7 col-xs-6" style="text-transform: capitalize"
                     style="font-size: 19px"><?= $model->phone; ?></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " style="font-size: 19px;">Email:</div>
                <div class="col-sm-7 col-xs-6" style="font-size: 17px"><?= $model->email; ?></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>
            </div>
        </div>
        <div style="width: 500px;height: 200px; padding-left: 15px;padding-right: 15px; background-color: #F3F3F3; margin-top: -20px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; display: block; margin-left: auto; margin-right: auto;"">
            <div style="padding-top: 20px; padding-left: 10px; padding-right: 10px; padding-bottom: 10px">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'newPassword', ['inputOptions' => ['placeholder' => 'New Password', 'class' => 'form-control input-lg']])->passwordInput(['required' => true, 'maxlength' => 15, 'minlength' => '6'])->label(false); ?>
                <?= $form->field($model, 'confirmNewPassword', ['inputOptions' => ['placeholder' => 'Confirm New Password', 'class' => 'form-control input-lg']])->passwordInput(['required' => true])->label(false); ?>

                <?= Html::submitButton('Update', ['class' => 'btn btn-success']); ?>
                <?php $form = ActiveForm::end(); ?>
            </div>
        </div>

    </div>
</div>