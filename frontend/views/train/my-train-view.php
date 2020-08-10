<div class="container" style="position: relative">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <div class="row">
            <?php foreach ($model as $train) { ?>
                <h2>Train: <?= $train->type . $train->number ?></h2>
            <?php } ?>
            <hr class="colorgraph">
            <?php for ($i = 0; $i < sizeof($model3); $i++) {
                foreach ($model3[$i] as $schedule) { ?>
                    <div class=""
                         style="width: auto;height: 60px; border: 2px solid lightgray;position: relative; margin-top:-2px;border-radius: 10px;padding: 7px">
                        <div style="float: left;font-size: 16px">
                            <?php if ($schedule->arrival_time) { ?>
                                <?php echo "<span style='color: lightslategray'>" . "Arrive at: " . "</span>" . $schedule->arrival_time . "<br>" ?>
                            <?php } else {
                                echo "<span style='color: lightslategray'>" . "Arrive at: <span style='color: black'> --:--:--</span> " . "</span>" . "<br>";
                            } ?>
                            <?= $schedule->station->name ?>
                        </div>
                        <div style="float: right;font-size: 16px">
                            <?php if ($schedule->departure_time) { ?>
                                <?php echo "<span style='color: lightslategray'>" . "Leave at: " . "</span>" . $schedule->departure_time . "<br>" ?>
                            <?php } else {
                                echo "<span style='color: lightslategray'>" . "Leave at:<span style='color: black'>--:--:--</span> " . "</span>" . "<br>";
                            } ?>
                        </div>
                        <div style="position: absolute;left: 50%;margin-left: -50px;margin-top: -20px;top:50%">
                            <?php if ($schedule->arrival_time && $schedule->departure_time) { ?>
                                <?php $time = (strtotime($schedule->departure_time) - strtotime($schedule->arrival_time)) / 60 ?>
                                <?= 'Stop for' . " " . $time . " " . 'Minute' . "<br>" ?>
                            <?php } ?>

                            <?= 'Distance ' . $schedule->distance . ' KM' ?>
                        </div>
                    </div>
                    <?php if (!$schedule->departure_time) {
                        echo "<br>";
                    } ?>
                <?php }
            } ?>
        </div>
    </div>
</div>