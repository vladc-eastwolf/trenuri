<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Trip;
use yii\bootstrap\Modal;

?>
<?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <h2>Select Trip and number of stations</h2>
                <div class="">
                    <?= $form->field($model, "trip_id")->dropDownList(ArrayHelper::map(Trip::find()->asArray()->all(), 'id', 'id'), ['prompt' => 'Select Trip'])->label('Trip ' . Html::a('', '', [
                            'class' => 'glyphicon glyphicon-info-sign',
                            'data-toggle' => 'modal',
                            'data-target' => '#your-modal',
                        ])) ?>


                    <?php Modal::begin([
                        'header' => '<h2>Trip-Line Link </h2>',
                        'id' => 'your-modal',
                    ]); ?>

                    <table style="width:100%">

                        <tr>
                            <th>Trip Id</th>
                            <th>Line Name</th>
                            <th>Departure Time</th>
                            <th>Arrival Time</th>
                        </tr>
                        <?php foreach ($model2 as $mod2) { ?>
                            <tr>

                                <td><?= $mod2->id ?></td>
                                <td><?= $mod2->line->name ?></td>
                                <td><?= $mod2->departure_time ?></td>
                                <td><?= $mod2->arrival_time ?></td>

                            </tr>
                        <?php } ?>
                    </table>
                    <?php Modal::end(); ?>
                    <?= $form->field($model, 'count')->dropDownList(range(0, 100),['prompt'=>'Number of stations'])->label(false) ?>

                </div>
                <div class="row form-group">
                    <div class="col-xs-12 col-md-12">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block btn-lg']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $form = ActiveForm::end(); ?>
<?php
