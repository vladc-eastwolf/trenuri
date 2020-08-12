<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Hello <?= $user->firstname . ' ' . $user->lastname ?>,
Thank you for your registration.
To complete it follow the link below to verify your email and activate your account:

<?= $verifyLink ?>
If the person who did the registration is not you, ignore this e-mail and contact your e-mail support.