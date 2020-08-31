<?php

use yii\helpers\Html;

$this->title = 'Discount for'
?>

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <h1><?= Html::encode($this->title) . " " ?><span style="color: #00b1b1"><?= $type . ' ' ?></span><small
                        style="font-size: 20px">upload all the necessary documents.</small></h1>
            <hr class="colorgraph">

            <?php $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
            <div class="row">
                <div class="col-lg-6" style="font-size: 17px; color: #00b1b1">ID Photo</div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'imageFile1', ['inputOptions' => ['']])->fileInput()->label(false) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6"  style="font-size: 17px; color: #00b1b1">Retired License Photo</div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'imageFile2', ['inputOptions' => ['']])->fileInput()->label(false) ?>
                </div>
            </div>

            <hr class="colorgraph">
            <div class="row form-group">
                <div class="col-xs-12 col-md-6"><?= Html::submitButton('Send', ['class' => 'btn btn-primary btn-block btn-lg']) ?></div>
            </div>

            <?php $form = \yii\widgets\ActiveForm::end() ?>

        </div>
    </div>
</div>


