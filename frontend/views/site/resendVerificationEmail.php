<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Resend verification email';
?>
<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <h1><?= Html::encode($this->title) ?><small> please fill out your email. A verification email will be sent there.</small></h1>
            <hr class="colorgraph">


            <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

            <?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'ex: someone@something.com', 'class' => 'form-control input-lg']])->textInput(['autofocus' => true])->label(false) ?>

            <hr class="colorgraph">

            <div class="row form-group">
                <div class="col-xs-12 col-md-6">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-primary btn-block btn-lg']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
