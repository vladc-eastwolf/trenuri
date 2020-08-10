<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <div style="padding-bottom: 75px">
                <div style="float: left">
                    <h2><?php echo $origin ?></h2>
                    <h4><?= "<span style='color: #1b6d85'>" . 'Plecarea pe data de: ' . "</span>" . $date ?>  </h4>
                </div>
                <div style="float: right">
                    <h2> <?php echo $destination; ?></h2>
                </div>
            </div>
            <hr class="colorgraph">
            <div class="row">
                <?php for ($i = 0; $i < sizeof($model4); $i++) {
                    foreach ($model4[$i] as $trip) { ?>
                        <div class="collapsible">
                            <div style="float: left; color: #707070">
                                <?= $origin . "<br>"; ?>
                                <?= $trip->departure_time . "<br>"; ?>
                            </div>
                            <div style="float:right; color: #707070">
                                <?= $destination . "<br>"; ?>
                                <?= $trip->arrival_time . "<br>"; ?>
                            </div>
                            <div style="top: 10%; left: 50%; right: 50%;transform: translate(22%, 10%)">
                                <?php
                                $distance=0;
                                for ($j = 0; $j < sizeof($lista); $j++) {
                                    foreach ($lista[$j] as $list) {
                                        $distance=$distance+$list->distance;
                                    }
                                }
                                ?>

                                <?php
                                if ($trip->arrival_time < $trip->departure_time) {
                                    $test = (strtotime($trip->departure_time) - strtotime($trip->arrival_time)) / 60;
                                    $reference = 24 * 60;
                                    $time = ($reference - $test);
                                } else {
                                    $time = (strtotime($trip->arrival_time)) / 60 - (strtotime($trip->departure_time)) / 60;
                                }
                                if ($time > 60) {
                                    echo intdiv($time, 60) . ':' . ($time % 60) . " " . "Hours-" . $distance . ' KM' . "<br>";
                                } else {
                                    echo $time . " " . "Minutes-" . $distance . ' KM' . "<br>";
                                }
                                ?>
                                <?= 'Operator:' . " " . $trip->line->operator->name . "<br>"; ?>
                                <div style="top: 10%; left: 45%; right: 50%;transform: translate(17.4%, 10%)">
                                    <?php for ($x = 0;
                                    $x < sizeof($trenuri);
                                    $x++) {
                                    foreach ($trenuri[$x] as $train) {
                                    if ($train->id == $trip->train_id) {
                                    echo $train->type ?> <a
                                            href='<?= Url::to(['my-train-view', 'train_code' => $train->number]) ?>'><?php echo $train->number . "</a>";
                                        }
                                        }
                                        } ?>
                                </div>
                            </div>
                        </div>
                        <div class="content" style="height: 175px;margin-top:-18px">
                            <div class="row">
                                <?php for ($j = 0; $j < sizeof($lista); $j++) { ?>
                                    <?php foreach ($lista[$j] as $list) { ?>
                                        <?php if ($list->trip_id == $trip->id) { ?>
                                            <div class="col-md-3">
                                                <p><?= $list->station->name ?></p>
                                                <p><?= $list->arrival_time ?></p>
                                                <p><?= $list->departure_time ?></p>

                                            </div>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <br>
                            <div class="float-left">
                                <?= Html::a('<span class="glyphicon glyphicon-usd"></span><span style="font-family: Arial; text-align: center; margin: auto;">Tickets</span>',
                                    ['/ticket/index',
                                        'train_id' => $trip->train_id,
                                        'operator_id' => $trip->line->operator_id,
                                        'departure_time' => $trip->departure_time,
                                        'arrival_time' => $trip->arrival_time,
                                        'origin' => $origin,
                                        'destination' => $destination,
                                        'distance'=>$distance
                                    ], [
                                        'class' => 'btn btn-primary',
                                        'style' => ['width' => '100px', 'border-radius' => '15px'],
                                    ]) ?>
                                <?= Html::button('<span class="glyphicon glyphicon-map-marker"></span><span style="font-family: Arial">Map</span>', [
                                    'class' => 'btn btn-success',
                                    'style' => ['width' => '75px', 'border-radius' => '15px'],
                                ]) ?>
                            </div>
                        </div>
                        <?= "<br>"; ?>
                    <?php }
                } ?>
            </div>

        </div>
    </div>
</div>

<script>

    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>



