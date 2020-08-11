<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
?>
<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <h1><?= Html::encode($this->title) ?><small style="font-size: 20px"> If you have business inquiries or other questions, please fill out the following form to contact us.</small></h1>

            <hr class="colorgraph">

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>


            <div class="form-group">
                <?= $form->field($model, 'name', ['inputOptions' => ['placeholder' => 'Full Name', 'class' => 'form-control input-lg']])->textInput(['autofocus' => true, 'style' => 'text-transform:capitalize'])->label(false) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'Email', 'class' => 'form-control input-lg']])->label(false) ?>

            </div>
            <div class="form-group">
                <?= $form->field($model, 'subject', ['inputOptions' => ['placeholder' => 'Phone', 'class' => 'form-control input-lg']])->label(false) ?>

            </div>
            <div class="form-group">
                <?= $form->field($model, 'body', ['inputOptions' => ['placeholder' => 'Body', 'class' => 'form-control input-lg']])->textarea(['rows' => 6])->label(false) ?>

            </div>


            <?= $form->field($model, 'verifyCode', ['inputOptions' => ['class' => 'form-control input-lg']])->widget(Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
            ])->label(false) ?>
            <hr class="colorgraph">
            <div class="row form-group">
                <div class="col-xs-12 col-md-6"><?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-lg']) ?></div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
