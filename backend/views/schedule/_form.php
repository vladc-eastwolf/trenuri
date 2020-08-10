<?php

use backend\models\Line;
use kartik\time\TimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Trip;
use backend\models\Station;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="after-add-more">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'trip_id')->dropDownList(ArrayHelper::map(Trip::find()->asArray()->all(), 'id', 'id'), ['prompt' => 'Select Trip'])->label('Trip' . Html::a('', '', [
            'class' => 'glyphicon glyphicon-info-sign',
            'data-toggle' => 'modal',
            'data-target' => '#your-modal',
        ])) ?>

    <?= $form->field($model, 'station_id')->dropDownList(ArrayHelper::map(Station::find()->asArray()->all(), 'id', 'name'), ['prompt' => 'Select Station'])->label('Station') ?>

    <?= $form->field($model, 'station_order')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'distance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arrival_time')->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Arrival At'],
            'pluginOptions' => [
                'showMeridian' => false,
                'minuteStep' => 1,
                'defaultTime' => false,

            ]
        ])
    ?>
    <?= $form->field($model, 'departure_time')->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Departure At'],
            'pluginOptions' => [
                'showMeridian' => false,
                'minuteStep' => 1,
                'defaultTime' => false,

            ]
        ])
    ?>


</div>

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

<?php ActiveForm::end(); ?>

<script>
    $(document).ready(function () {

        $("body").on("click", ".add-more", function () {
            var html = $(".after-add-more").first().clone();
            //  $(html).find(".change").prepend("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");

            $(html).find(".change").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");


            $(".after-add-more").last().after(html);


        });

        $("body").on("click", ".remove", function () {
            $(this).parents(".after-add-more").remove();
        });
    });


</script>
