<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

$this->title = 'Sign-up';

?>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <h1><?= $this->title ?> <small style="font-size: 20px">It's free and always will be.</small></h1>
            <hr class="colorgraph">

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <?= $form->field($model, 'firstname', ['inputOptions' => ['placeholder' => 'First Name', 'class' => 'form-control input-lg']])->textInput(['autofocus' => true, 'style' => 'text-transform:capitalize'])->label(false) ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <?= $form->field($model, 'lastname', ['inputOptions' => ['placeholder' => 'Last Name', 'class' => 'form-control input-lg']])->textInput(['style' => 'text-transform:capitalize'])->label(false) ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'phone', ['inputOptions' => ['placeholder' => 'Phone', 'class' => 'form-control input-lg']])->label(false) ?>
            </div>

            <div class="form-group">
                <?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'E-mail', 'class' => 'form-control input-lg']])->label(false) ?>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <?= $form->field($model, 'password', ['inputOptions' => ['placeholder' => 'Password', 'class' => 'form-control input-lg']])->passwordInput()->label(false) ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-3 col-md-3">

                    <?php $checkbox = $form->field($model, 'iagree')->checkbox(['label' => 'I Agree','required'=>true]) ?>
                    <button type="button" class="btn" data-color="info" tabindex="7"><?= $checkbox ?></button>

                </div>

                <div class="col-xs-8 col-sm-9 col-md-9">
                    By clicking <strong class="label label-primary">Register</strong>, you agree to the <?= Html::a('Terms and conditions','',[ 'data-toggle' => 'modal',
                        'data-target' => '#your-modal',]) ?> set out by this site, including our Cookie Use.

                    <?php Modal::begin([
                        'header' => '<h2>Terms and Conditions</h2>',
                        'id' => 'your-modal',
                    ]);

                    echo 'Say hello...';

                    Modal::end();
                    ?>


                </div>
            </div>

            <hr class="colorgraph">
            <div class="row form-group">
                <div class="col-xs-12 col-md-6"><?= Html::submitButton('Register', ['class' => 'btn btn-primary btn-block btn-lg']) ?></div>

                <div class="col-xs-12 col-md-6"><a href="<?= Url::to('@web/site/login') ?>"
                                                   class="btn btn-success btn-block btn-lg">Login</a>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>