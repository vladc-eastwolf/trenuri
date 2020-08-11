<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
?>
<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <h1><?= Html::encode($this->title) ?><small>Please choose your new password:</small></h1>

            <hr class="colorgraph">

            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

            <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control input-lg']])->passwordInput(['autofocus' => true])->label(false) ?>

            <hr class="colorgraph">

            <div class="row form-group">
                <div class="col-xs-12 col-md-6">
                    <?= Html::submitButton('Reset', ['class' => 'btn btn-primary btn-block btn-lg']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
