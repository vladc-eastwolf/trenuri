<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Please fill out the following fields to login:</p>
            <hr class="colorgraph">

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'E-mail', 'class' => 'form-control input-lg']])->textInput(['autofocus' => true])->label(false) ?>

            <?= $form->field($model, 'password', ['inputOptions' => ['placeholder' => 'Password', 'class' => 'form-control input-lg']])->passwordInput()->label(false) ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div style="color:#999;margin:1em 0">
                If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                <br>
                Need new verification email? <?= Html::a('Resend', ['site/resend-verification-email']) ?>
            </div>
            <hr class="colorgraph">

            <div class="row form-group">
                <div class="col-xs-12 col-md-6">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block btn-lg']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
