<?php

namespace console\controllers;

use backend\models\Operates;
use frontend\models\Composition;
use frontend\models\CompositionHistory;
use frontend\models\Discount;
use frontend\models\User;
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
        $tickets = Ticket::find()->all();
        $time = new \DateTime('now');
        $today = $time->format('Y-m-d H:i:s');
        foreach ($tickets as $ticket) {
            if (strtotime($today) > strtotime($ticket->journey_date . $ticket->arrival_time)) {
                $ticket->delete();
            }

        }
    }

    public function actionDiscount()
    {
        $discounts = Discount::find()->all();
        foreach ($discounts as $discount) {
            if ($discount->status == 11) {
                $user = User::findOne(['id' => $discount->user_id]);
                if ($discount->identityCard->status == 10 && !empty($discount->student_id) && $discount->student->status == 10) {
                    $user->discount = 'student';
                } else if ($discount->identityCard->status == 10 && !empty($discount->school_id) && $discount->school->status == 10) {
                    $user->discount = 'school';
                } else if ($discount->identityCard->status == 10 && !empty($discount->retired_id) && $discount->retired->status == 10) {
                    $user->discount = 'retired';
                }
                $user->save();
            }
        }
    }

    public function actionComposition()
    {

        $compositions = Composition::find()->all();
        foreach ($compositions as $comp) {
            $operates = Operates::find()->where(['composition_id' => $comp->id])->andWhere(['trip_id' => $comp->trip_id])->all();
            foreach ($operates as $op) {
                if (strtotime($op->date_to) < strtotime(date('H:i:s'))) {
                    echo date('H:i:s');
                    $chistory = CompositionHistory::findOne(['composition_id' => $comp->id, 'train_id' => $comp->train_id]);
                    $comp->seats_first_class = $chistory->seats_first_class;
                    $comp->seats_second_class = $chistory->seats_second_class;
                    $comp->additional_capacity = $chistory->additional_capacity;
                    $comp->save();
                }
            }
        }

    }
}