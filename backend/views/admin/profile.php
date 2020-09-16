<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>


<div class="container">
    <div class="row">
        <div class="box" style="width: 500px; height: 140px; background-color: lightgray; border-radius: 15px; display: block; margin-left: auto; margin-right: auto;">
            <div class="fields" style="padding: 10px">


                <div class="col-sm-5 col-xs-6 tital" style="font-size: 19px; color: darkgray">First Name:</div>
                <div class="col-sm-7 col-xs-6" style="text-transform: capitalize"
                     style="font-size: 19px"><?= $model->firstname; ?></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " style="font-size: 19px; color: darkgray">Last name:</div>
                <div class="col-sm-7 col-xs-6" style="text-transform: capitalize"
                     style="font-size: 19px"><?= $model->lastname; ?></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " style="font-size: 19px; color: darkgray">Phone:</div>
                <div class="col-sm-7 col-xs-6" style="text-transform: capitalize"
                     style="font-size: 19px"><?= $model->phone; ?></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>

                <div class="col-sm-5 col-xs-6 tital " style="font-size: 19px; color: darkgray">Email:</div>
                <div class="col-sm-7 col-xs-6" style="font-size: 17px"><?= $model->email; ?></div>
                <div class="clearfix"></div>
                <div class="bot-border"></div>
            </div>
        </div>
        <div style="width: 500px;height: 200px; padding-left: 15px;padding-right: 15px; background-color: #DCDCDC; margin-top: -20px; border-bottom-left-radius: 15px;border-bottom-right-radius: 15px; display: block; margin-left: auto; margin-right: auto;"">
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