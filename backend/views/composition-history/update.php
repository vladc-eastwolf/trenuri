<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CompositionHistory */

$this->title = 'Update Composition History: ' . $model->composition_id;
$this->params['breadcrumbs'][] = ['label' => 'Composition Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->composition_id, 'url' => ['view', 'composition_id' => $model->composition_id, 'update_time' => $model->update_time]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="composition-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
