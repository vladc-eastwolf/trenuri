<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OperationalInterval */

$this->title = 'Update Operational Interval: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Operational Intervals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operational-interval-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
