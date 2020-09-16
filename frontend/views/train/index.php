<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use frontend\models\Station;
use kartik\select2\Select2;
use kartik\date\DatePicker;


$this->title = 'Train Routes';
?>

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

            <?php if (Yii::$app->session->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i>Saved!</h4>
                    <?= Yii::$app->session->getFlash('success') ?>
                </div>
            <?php endif; ?>


            <?php if (Yii::$app->session->hasFlash('error')): ?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-check"></i>Error!</h4>
                    <?= Yii::$app->session->getFlash('error') ?>
                </div>
            <?php endif; ?>

            <?php $form = ActiveForm::begin(); ?>
            <h1><?= Html::encode($this->title) . " " ?></h1>

            <hr class="colorgraph">
            <div class="form-group">
                <?php
                echo $form->field($model, 'origin')->label(false)->widget(Select2::className(), [
                    'data' => $data,
                    'options' => [
                        'placeholder' => 'From',
                    ],
                    'size' => 'lg',


                ])
                ?>
            </div>
            <div class="form-group">
                <?php
                echo $form->field($model, 'destination')->label(false)->widget(Select2::className(), [
                    'data' => $data,
                    'options' => [
                        'placeholder' => 'To',

                    ],
                    'size' => 'lg',
                ])
                ?>
            </div>
            <div class="form-group">
                <?php
                echo $form->field($model, 'date')->label(false)->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => 'When'],
                    'size' => 'lg',
                    'pluginOptions' => [
                        'format' => 'yyyy-m-d',
                        'startDate' => date('yyyy-m-d'),
                        'endDate' => date('yyyy-m-d',strtotime('+ 7 days')),
                        'todayHighlight' => true,
                        'minDate' => 0,
                    ]
                ]);
                ?>
            </div>

            <hr class="colorgraph">
            <div class="row form-group">
                <div class="col-xs-12 col-md-12"><?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-block btn-lg']) ?></div>

            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


