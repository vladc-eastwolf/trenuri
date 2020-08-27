<?php

namespace console\controllers;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;

class CronController extends Controller {

    public function actionTest() {
        echo "Test cron job"; // your logic for deleting old post goes here
        exit();
    }
}