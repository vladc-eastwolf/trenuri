<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['user/reset-email', 'token' => $user->email_reset_token]);
?>
Hello <?= $user->firstname . ' ' . $user->lastname ?>,

Follow the link below to reset your password:

<?= $resetLink ?>
