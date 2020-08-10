<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OperationalInterval */

$this->title = 'Create Operational Interval';
$this->params['breadcrumbs'][] = ['label' => 'Operational Intervals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <div class="operational-interval-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>