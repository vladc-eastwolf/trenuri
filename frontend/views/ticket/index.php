<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\models\User;

$this->title = 'Ticket Details:'
?>

<div class="container">
    <div class="row">
        <div class="col-lg-7 col-md-push-3 ">
            <h1 style="color: #00b1b1"><?= Html::encode($this->title) ?></h1>
            <div style="padding-bottom: 60px">
                <div style="float: left">
                    <h4><?php echo '<span style="color: #1b6d85">From: </span>' . $origin ?></h4>
                    <h4><?= "<span style='color: #1b6d85'>" . 'Plecarea pe data de: ' . "</span>" . $date ?>  </h4>
                </div>
                <div style="float: right">
                    <h4> <?php echo '<span style="color: #1b6d85">To: </span>' . $destination ?></h4>
                </div>
            </div>
            <hr class="colorgraph">
            <div class="panel panel-default">
                <div class="panel-body">

                    <div class="box box-info">
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="box-body">
                            <div class="clearfix"></div>

                            <div class="col-sm-5 col-xs-6 tital ">Seats available first class: <span
                                        style="color: green"><?= $model2->seats_first_class ?></span></div>
                            <div class="col-sm-7 col-xs-6" style="text-transform: capitalize"></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-6 col-xs-6 tital ">Seats available second class: <span
                                        style="color: green"><?= $model2->seats_second_class ?></span></div>
                            <div class="col-sm-7" style="text-transform: capitalize"></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>


                            <div class="col-sm-5 col-xs-6 tital ">Aditional capacity: <span
                                        style="color: green"><?= $model2->additional_capacity ?></span></div>
                            <div class="col-sm-7"></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <hr style="border: 0;height: 1px;background: #333; background-image:  linear-gradient(to right, #ccc, #333, #ccc); ">
                            <?php
                            $items_seat = [
                                1 => 'First class',
                                2 => 'Second class',
                            ];
                            $user = User::findOne(['id' => Yii::$app->user->getId()]);
                            if(Yii::$app->user->isGuest || $user->discount == 'waiting' || $user->discount==null){
                                $items_ticket_type = [
                                    1 => 'Full Price',
                                ];
                            }else if($user->discount == 'student'){
                                $items_ticket_type = [
                                    1 => 'Full Price',
                                    2 => 'Student'
                                ];
                            }else if($user->discount == 'school'){
                                $items_ticket_type = [
                                    1 => 'Full Price',
                                    2 => 'School'
                                ];
                            }else if($user->discount == 'retired'){
                                $items_ticket_type = [
                                    1 => 'Full Price',
                                    2 => 'Retired'
                                ];
                            }

                            ?>

                            <div class="col-sm-5 col-xs-6 tital ">
                                <?= $form->field($model3, 'seat')->dropDownList(($items_seat), ['prompt' => 'Choose your seat..', 'required' => true])->label(false) ?>
                            </div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital ">
                                <?= $form->field($model3, 'ticket_type')->dropDownList(($items_ticket_type), ['prompt' => 'Ticket for..', 'required' => true])->label(false) ?>
                            </div>


                            <div class="clearfix"></div>


                            <div class="form-group col-sm-5">
                                <div class="form-group">
                                    <?= Html::submitButton('See Price', ['class' => 'btn btn-update']) ?>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <hr style="border: 0;height: 1px;background: #333; background-image:  linear-gradient(to right, #ccc, #333, #ccc); ">

                            <div class="col-sm-5 col-xs-6 tital ">
                                <?= $price1 ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="colorgraph">

            <?php $form = ActiveForm::end(); ?>

        </div>
    </div>
</div>




