<?php

use  yii\helpers\Html;

$this->title = 'Ticket Details';
?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h1 style="color: #00b1b1"><?= Html::encode($this->title) . " " ?></h1>
            <hr class="colorgraph" style="width: 388px">
            <section>

                <div class="special">
                    <span style="float: left;">
                        <span style="font-size: 12px;color: #00b1b1">From: </span>
                        <span style="color: black"><?= $ticket->departureStation->name ?></span>
                       <br>
                        <span style="color: black;float: left">
                            <?php echo $ticket->departure_time ?>
                        </span>
                    </span>
                    <span style="float: right;">
                        <span style="font-size: 12px;color: #00b1b1">To: </span>
                        <span style="color: black"><?= $ticket->arrivalStation->name ?></span>
                        <br>
                        <span style="color: black; float: right">
                             <?php echo $ticket->arrival_time ?>
                        </span>
                    </span>
                </div>

                <div class="special">
                    <span style="float: left;">
                        <span style="color: #00b1b1; font-size: 12px;">Sale Time: </span>
                        <span style="color: black"><?= $ticket->sales_time ?></span>
                    </span>
                    <span style="float: right;">
                        <span style="color: #00b1b1; font-size: 12px;">Distance: </span>
                        <span style="color: black"><?= $ticket->distance . 'KM' ?></span>
                    </span>
                </div>

                <div class="special">
                      <span style="float: left;">
                        <span style="font-size: 12px;color: #00b1b1">Date: </span>
                        <span style="color: black"><?= $ticket->journey_date ?></span>
                          <br>
                         <span style="font-size: 12px;color: #00b1b1">Seat: </span>
                        <span style="color: black"><?= $ticket->seat_reserved ?></span>
                      </span>
                    <span style="float: right;">
                        <span style="font-size: 12px;color: #00b1b1">Train: </span>
                        <span style="color: black"><?= $ticket->composition->train->type . $ticket->composition->train->number ?></span>
                    </span>
                </div>


                <div class="special">
                    <span style="float: left;padding-top: 3px">
                        <span style="color: #00b1b1; font-size: 12px;">Name: </span>
                        <span style="color: black"><?= $ticket->name ?></span>
                        <br>
                        <span style="color: #00b1b1; font-size: 12px;">Email: </span>
                        <span style="color: black"><?= $ticket->email ?></span>
                    </span>

                </div>

                <div class="special">
                     <span style="float: right;">
                        <span style="color: #00b1b1; font-size: 12px;">******* Price: </span>
                        <span style="color: black"><?= $ticket->price . 'Lei' ?></span>
                         <br>
                         <span style="float:right"><?= Html::a('Download Pdf', ['show-pdf', 'id' => $ticket->id,'user_id'=>Yii::$app->user->getId()]) ?></span>
                    </span>

                </div>


            </section>

            <aside>
                <figure>
                    <img src="" alt="">
                </figure>
            </aside>
        </div>
    </div>
</div>


<style>
    body {
        margin: 0;
        color: #e6e6e6;
    }

    section {
        width: 390px;
        padding: 3px;
        border: 1px solid #d9d9d9;

    }

    section .special {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        position: relative;
        height: 42px;
        background-color: #e6e6e6;
        color: #fff;

    }

    section .special:nth-child(2n+1) {
        background-color: #f2f2f2;
    }


</style>