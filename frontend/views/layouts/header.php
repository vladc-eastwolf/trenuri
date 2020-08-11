<!-- Navigation -->
<?php use yii\helpers\Url; ?>
<?php use yii\helpers\Html; ?>
<?php use yii\bootstrap\Dropdown; ?>
<?php
$this->title = 'Trains';
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= Url::to('/train/index') ?>"><?= $this->title ?></a>

        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-size: 15px">
            <ul class="nav navbar-nav navbar-right">

                <li><a href="<?= Url::to('/train/index') ?>">Train</a></li>
                <li><a href="<?= Url::to('/train/my-train') ?>">My Train</a></li>
                <li><a href="<?= Url::to('@web/site/contact') ?>">Contact</a></li>
                <?php if (Yii::$app->user->isGuest) { ?>
                    <li><a href="<?= Url::to('@web/site/signup') ?>">Sign-up</a></li>
                    <li><a href="<?= Url::to('@web/site/login') ?>">Login</a></li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle " style="font-family: Arial" ><?= " " . Yii::$app->user->identity->firstname." ".Yii::$app->user->identity->lastname; ?><b class="caret"></b></a>
                        <?php
                        echo Dropdown::widget([
                            'items' => [
                                ['label' => 'Profile', 'url' => ['user/profile', 'id' => Yii::$app->user->identity->getId()]],
                                ['label' => 'Tickets', 'url' => ['ticket/my-ticket']],
                                ['label' => 'Logout', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                            ],
                        ]);
                        ?>
                    </li>

                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>