<?php

namespace console\controllers;

use frontend\models\Composition;
use frontend\models\CompositionHistory;
use Yii;
use yii\console\Controller;
use yii\helpers\Console;
use frontend\models\Ticket;

class CronController extends Controller
{

    public function actionTest()
    {
        echo "Test cron job\n";
    }


    public function actionDelete()
    {
        $tickets=Ticket::find()->all();
        $time = new \DateTime('now');
        $today = $time->format('Y-m-d H:i:s');
        foreach($tickets as $ticket)
        {
            if(strtotime($today) > strtotime($ticket->journey_date . $ticket->arrival_time)){
                $ticket->delete();
            }

        }
    }
    public function actionComposition()
    {

        $compositions=Composition::find()->all();
        foreach ($compositions as $comp){
            $chistory=CompositionHistory::findAll(['train_id'=>$comp->train_id]);
        }

    }
}