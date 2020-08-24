<?php use yii\helpers\Url; ?>
<?php use yii\helpers\Html; ?>
<?php use yii\bootstrap\Dropdown; ?>
<?php
$this->title = 'Trains Administration';
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= Url::to(['site/index']) ?>"><?= $this->title ?></a>

        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-size: 15px">
            <ul class="nav navbar-nav navbar-right">
                <?php if(!Yii::$app->user->isGuest) {?>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle" style="font-family: Arial">Trains<b
                                class="caret"></b></a>
                    <?php
                    echo Dropdown::widget([
                        'items' => [
                            ['label' => 'Location', 'url' => ['location/index']],
                            ['label' => 'Station', 'url' => ['station/index']],
                            ['label' => 'Operator', 'url' => ['operator/index']],
                            ['label' => 'Train', 'url' => ['train/index']],
                            ['label' => 'Line', 'url' => ['line/index']],
                            ['label' => 'Operational Interval', 'url' => ['operational-interval/index']],
                            ['label' => 'Trip', 'url' => ['trip/index']],
                            ['label' => 'Schedule', 'url' => ['schedule/index']],
                            ['label' => 'Composition', 'url' => ['composition/index']],
                            ['label' => 'Composition-History', 'url' => ['composition-history/index']],
                            ['label' => 'Operates', 'url' => ['operates/index']],
                            ['label' => 'Ticket', 'url' => ['ticket/index']],

                        ]
                    ]) ?>
                </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" style="font-family: Arial">Administration<b
                                    class="caret"></b></a>
                        <?php
                        echo Dropdown::widget([
                            'items' => [
                                ['label' => 'Mails', 'url' => ['contact/index']],


                            ]
                        ]) ?>
                    </li>
                <?php } ?>
                <?php if (Yii::$app->user->isGuest) { ?>
                    <li><a href="<?= Url::to('@web/site/login') ?>">Login</a></li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle "
                           style="font-family: Arial"><?= " " . Yii::$app->user->identity->email; ?><b
                                    class="caret"></b></a>
                        <?php
                        echo Dropdown::widget([
                            'id' => 'dropdown',
                            'items' => [
                                ['label' => 'Profile', 'url' => ['']],
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

