<?php


use yii\helpers\Html;


$this->title = 'Ticket List';
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
             <h1 style="color: #00b1b1"><?= Html::encode($this->title) . " " ?><small style="font-size: 20px">a list of all your available
                    tickets:</small></h1>
            <hr class="colorgraph">


            <?php foreach ($tickets as $ticket) { ?>

                <div style="border: 2px solid lightgray; margin-top: 10px; border-radius: 10px; height: 100px">
                    <div style="float: left; padding: 5px">
                        <span style="font-size: 15px;color: #00b1b1">From: </span>
                        <span style="color: black"><?= $ticket->departureStation->name ?></span>
                        <br>
                        <span style="color: black"><?= $ticket->departure_time ?></span>
                        <br>
                        <?= Html::a('Details',['my-ticket','id'=>$ticket->id]) ?>

                    </div>
                    <div style="float:right; padding: 5px">
                        <span style="font-size: 15px;color: #00b1b1">To: </span>
                        <span style="color: black"><?= $ticket->arrivalStation->name ?></span>
                        <br>
                        <span style="color: black; float: right"><?= $ticket->arrival_time ?></span>
                        <br>

                    </div>

                    <div style="top: 25%; left: 100%; right: 100%;transform: translate(18%, 60%)">
                        <span style="font-size: 15px;color: #00b1b1">Seat: </span>
                        <span style="color: black"><?= $ticket->seat_reserved ?></span>
                        <br>
                        <?php if ($ticket->is_first_class) { ?>
                            <span style="font-size: 15px;color: #00b1b1">Class : </span>
                            <span style="color: black;">1</span>
                        <?php } else if ($ticket->is_second_class) { ?>
                            <span style="font-size: 15px;color: #00b1b1">Class : </span>
                            <span style="color: black;">2</span>
                        <?php } ?>
                        <br>
                    </div>

                    <br>
                    <br>
                </div>

            <?php } ?>


        </div>
    </div>
</div>
