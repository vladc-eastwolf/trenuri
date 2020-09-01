<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\RetiredLicense */

$this->title = 'Retired License Check';
$this->params['breadcrumbs'][] = ['label' => 'Retired Licenses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="retired-license-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = \yii\widgets\ActiveForm::begin() ?>


    <div class="student-license-photos" style="padding-top: 10px;padding-bottom: 10px;">
        <div class="row" style="padding-bottom: 10px">
            <div class="col-lg-6"><?= Html::img(Url::to(['/image/retired-open', 'id' => $model->id]), ['style' => 'width:500px; height:200px']) ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'status')->dropDownList([9=>'Unapproved',10=>'Approved']) ?>

        </div>
    </div>

    <div class="row form-group">
        <div class="col-xs-12 col-md-6"><?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?></div>
    </div>

    <?php $form = \yii\widgets\ActiveForm::end() ?>

</div>
