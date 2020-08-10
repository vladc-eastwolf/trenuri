<?php

use backend\models\Station;
use backend\models\Trip;
use kartik\time\TimePicker;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Line;

?>
<?php echo "<h2><span style='color: #1b6d85'>" . 'Schedule for Trip: </span>' . $model3->id . '-' . $model3->line->name .  "</h2>" ?>
<?php $form = ActiveForm::begin(); ?>
<?php
foreach ($model as $i => $mod) {
    ?>

    <?= $form->field($mod, "[$i]station_id")->dropDownList(ArrayHelper::map(Station::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Station'])->label('Station') ?>

    <?= $form->field($mod, "[$i]station_order")->textInput(['maxlength' => true]) ?>

    <?= $form->field($mod, "[$i]distance")->textInput(['maxlength' => true]) ?>

    <?= $form->field($mod, "[$i]arrival_time")->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Arrival At'],
            'pluginOptions' => [
                'minuteStep' => 1,
                'defaultTime' => false,
                'showMeridian' => false,
            ]
        ])->label('Arrival Time ' . Html::a('', '', [
            'class' => 'glyphicon glyphicon-info-sign',
            'data-toggle' => 'modal',
            'data-target' => '#your-modal',
        ]));
    ?>
    <?= $form->field($mod, "[$i]departure_time")->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Departure At'],
            'pluginOptions' => [
                'minuteStep' => 1,
                'defaultTime' => false,
                'showMeridian' => false,
            ]
        ])->label('Departure Time ' . Html::a('', '', [
            'class' => 'glyphicon glyphicon-info-sign',
            'data-toggle' => 'modal',
            'data-target' => '#your-modal',
        ]));
    echo "<hr>";
    ?>
    <?php
}

?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>


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

<?php $form = ActiveForm::end(); ?>

