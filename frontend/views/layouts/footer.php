<?php
use yii\helpers\Html;
?>


<div style="position: absolute; bottom: -150px; background-color:#f5f5f5; width: 100%; height: 59px">
    <div class="container">
        <p class="pull-left" style="padding-top:20px">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="pull-right" style="padding-top:20px"><?= Yii::powered() ?></p>
    </div>
</div>
