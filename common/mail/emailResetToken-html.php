<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/reset-email', 'token' => $user->email_reset_token]);
?>
<div class="email-reset">
    <p>Hello <?= Html::encode($user->firstname . ' ' . $user->lastname) ?>,</p>

    <p>Follow the link below to reset your Email:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
