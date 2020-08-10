<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$this->title = 'My train';
?>
<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <?php $form = ActiveForm::begin(); ?>
            <h2><?= $this->title ?></h2>
            <hr class="colorgraph">

            <div class="form-group">
                <?= $form->field($model, 'number',['inputOptions' => ['placeholder' => 'Train Number', 'class' => 'form-control input-lg']])->textInput(['autofocus' => true,'required'=>true])->label(false) ?>

            </div>

            <hr class="colorgraph">
            <div class="row form-group">
                <div class="col-xs-12 col-md-6"><?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-block btn-lg']) ?></div>

                <div class="col-xs-12 col-md-6">  <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary btn-block btn-lg']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>