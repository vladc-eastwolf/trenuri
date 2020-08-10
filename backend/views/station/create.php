<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Station */

$this->title = 'Create Station';
$this->params['breadcrumbs'][] = ['label' => 'Stations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="station-create">
        <div class="col-lg-6">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>