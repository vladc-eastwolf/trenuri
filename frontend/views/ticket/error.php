<?php

/* @var $this yii\web\View */
/* @var $message string */


/* @var $exception Exception */

use yii\helpers\Html;

$this->title = 'Error';
$message = 'You are not allowed to perform this action.'

?>
<div class="container">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

        <h1><?= Html::encode($this->title) ?></h1>
        <hr class="colorgraph">
        <div class="alert alert-danger">
            <?= nl2br(Html::encode($message)) ?>
        </div>

        <p>
            There is no ticket with this ID.
        </p>
        <p>
            Please contact us if you think this is a server error. Thank you.
        </p>
    </div>
</div>
