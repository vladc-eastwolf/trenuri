<?php

use backend\models\Operator;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Composition;
use backend\models\Train;

/* @var $this yii\web\View */
/* @var $model backend\models\CompositionHistory */

$this->title = 'Create Composition History';
$this->params['breadcrumbs'][] = ['label' => 'Composition Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="composition-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="composition-history-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'composition_id')->dropDownList(ArrayHelper::map(Composition::find()->asArray()->all(), 'id', 'id'), ['prompt' => 'Select Composition'])->label('Composition' . Html::a('', '', [
                'class' => 'glyphicon glyphicon-info-sign',
                'data-toggle' => 'modal',
                'data-target' => '#your-modal',
            ])) ?>

        <?= $form->field($model, 'train_id')->dropDownList(ArrayHelper::map(Train::find()->asArray()->all(), 'id', 'number', 'type'), ['prompt' => 'Select Train'])->label('Train') ?>

        <?= $form->field($model, 'seats_first_class')->textInput() ?>

        <?= $form->field($model, 'seats_second_class')->textInput() ?>

        <?= $form->field($model, 'additional_capacity')->textInput() ?>

        <?= $form->field($model, 'operator_id')->dropDownList(ArrayHelper::map(Operator::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Operator'])->label('Operator') ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

    <?php Modal::begin([
        'header' => '<h2>Composition </h2>',
        'id' => 'your-modal',
        'size' => 'modal-lg',
    ]); ?>

    <table style="width:100%">

        <tr>
            <th>ID</th>
            <th>Train ID</th>
            <th>Seats First Class</th>
            <th>Seats Second Class</th>
            <th>Additional Capacity</th>
            <th>Update Time</th>
            <th>Operator</th>
        </tr>
        <?php foreach ($model2 as $mod2) { ?>
            <tr>

                <td><?= $mod2->id ?></td>
                <td><?= $mod2->train->type . $mod2->train->number ?></td>
                <td><?= $mod2->seats_first_class ?></td>
                <td><?= $mod2->seats_second_class ?></td>
                <td><?= $mod2->additional_capacity ?></td>
                <td><?= $mod2->update_time ?></td>
                <td><?= $mod2->operator->name ?></td>

            </tr>
        <?php } ?>

    </table>
    <?php Modal::end(); ?>

</div>



