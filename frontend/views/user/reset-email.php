<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ResetEmailForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset Email';
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Please choose your new Email:</p>
            <hr class="colorgraph">

            <?php $form = ActiveForm::begin(['id' => 'reset-email-form']); ?>

            <?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'E-mail', 'class' => 'form-control input-lg']])->label(false) ?>

            <hr class="colorgraph">

            <div class="form-group">
                <?= Html::submitButton('Send', ['class' => 'btn btn-primary btn-block btn-lg']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
