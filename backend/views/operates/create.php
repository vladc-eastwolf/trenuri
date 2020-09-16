<?php

use backend\models\Composition;
use backend\models\Trip;
use kartik\date\DatePicker;
use yii\bootstrap\Modal;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Operates */

$this->title = 'Create Operates';
$this->params['breadcrumbs'][] = ['label' => 'Operates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'composition_id')->dropDownList(ArrayHelper::map(Composition::find()->asArray()->all(), 'id', 'id'), ['prompt' => 'Select Composition'])->label('Composition' .  Html::a('', '', [
            'class' => 'glyphicon glyphicon-info-sign',
            'data-toggle' => 'modal',
            'data-target' => '#your-modal-comp',
        ])) ?>

    <?= $form->field($model, "trip_id")->dropDownList(ArrayHelper::map(Trip::find()->asArray()->all(), 'id', 'id'), ['prompt' => 'Select Trip'])->label('Trip ' . Html::a('', '', [
            'class' => 'glyphicon glyphicon-info-sign',
            'data-toggle' => 'modal',
            'data-target' => '#your-modal',
        ])) ?>
    <?= $form->field($model, 'date_from')->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Arrival At'],
            'pluginOptions' => [
                'showMeridian' => false,
                'minuteStep' => 1,
                'defaultTime' => false,

            ]
        ])
    ?>

    <?= $form->field($model, 'date_to')->widget(TimePicker::className(),
        [
            'options' => ['placeholder' => 'Arrival At'],
            'pluginOptions' => [
                'showMeridian' => false,
                'minuteStep' => 1,
                'defaultTime' => false,

            ]
        ])
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

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

<?php Modal::begin([
    'header' => '<h2>Composition </h2>',
    'id' => 'your-modal-comp',
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
        <?php foreach ($model3 as $mod2) { ?>
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