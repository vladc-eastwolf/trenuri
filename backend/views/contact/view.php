<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Contact */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="contact-view">

    <p style="float:right">
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'email:email',
            'subject',
            [
                'attribute' => 'body',
                'options' => ['style' => 'height:150px']
            ],
        ]
    ]) ?>

    <?php $form = ActiveForm::begin(['id' => 'contact-form']) ?>


    <div class="col-md-2">
        <?= $form->field($model, 'status')->dropDownList([0 => 'Unsolved', 1 => 'Solved']) ?>
    </div>
    <div class="col-md-3" style="padding-top: 25px">
        <div class="form-group">
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php $form = ActiveForm::end(); ?>

</div>

