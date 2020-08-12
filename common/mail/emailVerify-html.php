<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email">
    <p>Hello <?= Html::encode($user->firstname . ' ' . $user->lastname) ?>,</p>
    <p>Thank you for your registration.</p>
    <p>To complete it follow the link below to verify your email and activate your account:</p>

    <p><?= Html::a(Html::encode($verifyLink), $verifyLink) ?></p>

    <p>If the person who did the registration is not you, ignore this e-mail and contact your e-mail support. </p>
</div>
