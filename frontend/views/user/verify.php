<?php

use yii\helpers\Html;

$this->title = 'Who I am?'
?>

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <h1><?= Html::encode($this->title) . " " ?><small style="font-size: 20px">choose for witch discount you want
                    to apply.</small></h1>

            <hr class="colorgraph">

            <?php $form = \yii\widgets\ActiveForm::begin() ?>

            <?= $form->field($model, 'discount_type')->dropDownList(['student' => 'Student', 'schoolboy' => 'Schoolboy', 'retired' => 'Retired'],['prompt'=>'I am...'])->label(false) ?>

            <hr class="colorgraph">

            <div class="row form-group">
                <div class="col-xs-12 col-md-6"><?= Html::submitButton('Advance', ['class' => 'btn btn-primary btn-block btn-lg']) ?></div>
            </div>

            <?php $form = \yii\widgets\ActiveForm::end() ?>


        </div>
    </div>
</div>

