<?php

namespace frontend\controllers;

use frontend\models\Composition;
use frontend\models\CompositionHistory;
use frontend\models\Ticket;
use frontend\models\Trip;
use frontend\models\Station;
use Yii;
use yii\helpers\Html;
use frontend\models\User;
use frontend\models\Train;
use kartik\mpdf;
use kartik\mpdf\Pdf;

use yii\filters\AccessControl;

class TicketController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => [''],
                'rules' => [
                    [
                        'actions' => [''],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionDetails()
    {
        return $this->render('details');
    }
    public function actionMyTicketList($user_id)
    {
        $tickets=Ticket::findAll(['user_id'=>$user_id]);

        return $this->render('my-ticket-list',['tickets'=>$tickets]);
    }

    public function actionMyTicket($id)
    {
        $ticket = Ticket::findOne(['id' => $id]);

        return $this->render('my-ticket', [
            'ticket' => $ticket,
        ]);
    }

    public function actionGenPdf($id)
    {
        $ticket = Ticket::findOne(['id' => $id]);
        $pdf_content = $this->renderPartial('gen-pdf', [
            'ticket' => $ticket,
        ]);
        $mpdf = new mpdf\Pdf([
            'mode' => Pdf::MODE_CORE,
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            'content' => $pdf_content,
            'options' => ['title' => 'This is title test'],
            'methods' => [
                'SetHeader' => ['Ticket for: ' . $ticket->name . '       ' . $ticket->journey_date],
                'SetFooter' => ['©  all the right reserved to: Trains']
            ]
        ]);
        return $mpdf->render();

    }

    public function actionCheckOut($id, $origin, $destination, $date, $price, $fc, $sc, $train_id, $departure_time, $arrival_time, $distance)
    {
        $model = new Ticket();
        $model3 = Station::findOne(['name' => $origin]);
        $model4 = Station::findOne(['name' => $destination]);
        $composition = Composition::findOne(['train_id' => $train_id]);
        $chistory = new CompositionHistory();

        $chistory->composition_id = $composition->id;
        $chistory->train_id = $composition->train_id;
        $chistory->seats_second_class = $composition->seats_second_class;
        $chistory->seats_first_class = $composition->seats_first_class;
        $chistory->additional_capacity = $composition->additional_capacity;
        $chistory->operator_id = $composition->operator_id;
        $chistory->save();

        $chistory2 = CompositionHistory::findOne(['composition_id' => $composition->id]);

        if (!Yii::$app->user->isGuest) {
            $model2 = User::findOne(['id' => Yii::$app->user->getId()]);
            $model->user_id = Yii::$app->user->getId();
            $model->email = $model2->email;
            $model->name = $model2->firstname . " " . $model2->lastname;
        }

        if ($model->load(Yii::$app->request->post())) {

            $model->composition_id = $id;
            $model->departure_station_id = $model3->id;
            $model->arrival_station_id = $model4->id;
            $model->departure_time=$departure_time;
            $model->arrival_time=$arrival_time;
            $model->distance=$distance;
            $model->journey_date = $date;
            $model->price = $price;
            $model->is_first_class = $fc;
            $model->is_second_class = $sc;


            if ($model->is_first_class) {
                for ($i = $composition->seats_first_class; $i >= 1; $i--) {
                    $model->seat_reserved = $chistory2->seats_first_class - $i + 1;
                    $composition->seats_first_class--;
                    $composition->save();
                    break;
                }
            } else if ($model->is_second_class) {
                for ($i = $composition->seats_second_class; $i > $chistory2->seats_second_class - $composition->seats_first_class; $i--) {
                    $model->seat_reserved = $chistory2->seats_second_class - $i + ($chistory2->seats_second_class - $composition->seats_first_class);
                    $composition->seats_second_class--;
                    $composition->save();
                    break;
                }
            }
            $model->save();
            $ticket = Ticket::findOne(['id' => $model->id]);
            $id = $model->id;
            if ($model->save() && !(Yii::$app->user->isGuest)) {
                return $this->redirect(['my-ticket',
                    'id' => $id,
                ]);
            } else if ($model->save() && (Yii::$app->user->isGuest)) {
                $model->sendTicket();
                return $this->redirect(['gen-pdf',
                    'id' => $id,
                    'departure_time' => $departure_time,
                    'arrival_time' => $arrival_time,
                    'distance' => $distance
                ]);
            }
        }
        return $this->render('check-out', [
            'model' => $model,
            'model3' => $model3,
            'model4' => $model4,
        ]);
    }


    public function actionIndex($train_id, $operator_id, $departure_time, $arrival_time, $origin, $destination, $distance, $date)
    {
        $trip = Trip::findOne(['train_id' => $train_id, 'departure_time' => $departure_time, 'arrival_time' => $arrival_time]);
        $model2 = Composition::findOne(['train_id' => $train_id]);
        $model3 = new Composition();
        $price = null;
        $price1 = null;
        $fc = false;
        $sc = false;

        if ($model3->load(Yii::$app->request->post())) {
            //Adult
            if ($model3->ticket_type == 1) {
                //class I
                if ($model3->seat == 1) {
                    $fc = true;
                    if (intval($distance) >= 1 && intval($distance) <= 10) {
                        if ($trip->train->type == 'IR') {
                            $price = 7;
                        } else if ($trip->train->type == 'R') {
                            $price = 4;
                        }
                    } else if (intval($distance) >= 11 && intval($distance) <= 20) {
                        if ($trip->train->type == 'IR') {
                            $price = 10;
                        } else if ($trip->train->type == 'R') {
                            $price = 5;
                        }
                    } else if (intval($distance) >= 21 && intval($distance) <= 30) {
                        if ($trip->train->type == 'IR') {
                            $price = 14;
                        } else if ($trip->train->type == 'R') {
                            $price = 7;
                        }
                    } else if (intval($distance) >= 31 && intval($distance) <= 60) {
                        if ($trip->train->type == 'IR') {
                            $price = 28;
                        } else if ($trip->train->type == 'R') {
                            $price = 15;
                        }
                    } else if (intval($distance) >= 61 && intval($distance) <= 100) {
                        if ($trip->train->type == 'IR') {
                            $price = 46;
                        } else if ($trip->train->type == 'R') {
                            $price = 35;
                        }
                    } else if (intval($distance) >= 101 && intval($distance) <= 200) {
                        if ($trip->train->type == 'IR') {
                            $price = 100;
                        } else if ($trip->train->type == 'R') {
                            $price = 75;
                        }
                    }
                    //class II
                } else if ($model3->seat == 2) {
                    $sc = true;
                    if (intval($distance) >= 1 && intval($distance) <= 10) {
                        if ($trip->train->type == 'IR') {
                            $price = 4;
                        } else if ($trip->train->type == 'R') {
                            $price = 3;
                        }
                    } else if (intval($distance) >= 11 && intval($distance) <= 20) {
                        if ($trip->train->type == 'IR') {
                            $price = 7;
                        } else if ($trip->train->type == 'R') {
                            $price = 4;
                        }
                    } else if (intval($distance) >= 21 && intval($distance) <= 30) {
                        if ($trip->train->type == 'IR') {
                            $price = 11;
                        } else if ($trip->train->type == 'R') {
                            $price = 6;
                        }
                    } else if (intval($distance) >= 31 && intval($distance) <= 60) {
                        if ($trip->train->type == 'IR') {
                            $price = 23;
                        } else if ($trip->train->type == 'R') {
                            $price = 11;
                        }
                    } else if (intval($distance) >= 61 && intval($distance) <= 100) {
                        if ($trip->train->type == 'IR') {
                            $price = 35;
                        } else if ($trip->train->type == 'R') {
                            $price = 24;
                        }
                    } else if (intval($distance) >= 101 && intval($distance) <= 200) {
                        if ($trip->train->type == 'IR') {
                            $price = 91;
                        } else if ($trip->train->type == 'R') {
                            $price = 67;
                        }
                    }
                }
            }

            //class I Student
            if ($model3->seat == 1 && $model3->ticket_type == 2) {
                $fc = true;
                $price = 0;
            }
            //class II Student
            if ($model3->seat == 2 && $model3->ticket_type == 2) {
                $sc = true;
                $price = 0;
            }

            //Schoolkid
            if ($model3->ticket_type == 3 || $model3->ticket_type == 4) {
                //class I
                if ($model3->seat == 1) {
                    $fc = true;
                    if (intval($distance) >= 1 && intval($distance) <= 10) {
                        if ($trip->train->type == 'IR') {
                            $price = 3.5;
                        } else if ($trip->train->type == 'R') {
                            $price = 2;
                        }
                    } else if (intval($distance) >= 11 && intval($distance) <= 20) {
                        if ($trip->train->type == 'IR') {
                            $price = 5;
                        } else if ($trip->train->type == 'R') {
                            $price = 2.5;
                        }
                    } else if (intval($distance) >= 21 && intval($distance) <= 30) {
                        if ($trip->train->type == 'IR') {
                            $price = 7;
                        } else if ($trip->train->type == 'R') {
                            $price = 3.5;
                        }
                    } else if (intval($distance) >= 31 && intval($distance) <= 60) {
                        if ($trip->train->type == 'IR') {
                            $price = 14;
                        } else if ($trip->train->type == 'R') {
                            $price = 7.5;
                        }
                    } else if (intval($distance) >= 61 && intval($distance) <= 100) {
                        if ($trip->train->type == 'IR') {
                            $price = 23;
                        } else if ($trip->train->type == 'R') {
                            $price = 17.5;
                        }
                    } else if (intval($distance) >= 101 && intval($distance) <= 200) {
                        if ($trip->train->type == 'IR') {
                            $price = 50;
                        } else if ($trip->train->type == 'R') {
                            $price = 37.5;
                        }
                    }
                    //class II
                } else if ($model3->seat == 2) {
                    $sc = true;
                    if (intval($distance) >= 1 && intval($distance) <= 10) {
                        if ($trip->train->type == 'IR') {
                            $price = 2;
                        } else if ($trip->train->type == 'R') {
                            $price = 1.5;
                        }
                    } else if (intval($distance) >= 11 && intval($distance) <= 20) {
                        if ($trip->train->type == 'IR') {
                            $price = 3.5;
                        } else if ($trip->train->type == 'R') {
                            $price = 2;
                        }
                    } else if (intval($distance) >= 21 && intval($distance) <= 30) {
                        if ($trip->train->type == 'IR') {
                            $price = 5.5;
                        } else if ($trip->train->type == 'R') {
                            $price = 3;
                        }
                    } else if (intval($distance) >= 31 && intval($distance) <= 60) {
                        if ($trip->train->type == 'IR') {
                            $price = 11.5;
                        } else if ($trip->train->type == 'R') {
                            $price = 5.5;
                        }
                    } else if (intval($distance) >= 61 && intval($distance) <= 100) {
                        if ($trip->train->type == 'IR') {
                            $price = 17.5;
                        } else if ($trip->train->type == 'R') {
                            $price = 12;
                        }
                    } else if (intval($distance) >= 101 && intval($distance) <= 200) {
                        if ($trip->train->type == 'IR') {
                            $price = 45.5;
                        } else if ($trip->train->type == 'R') {
                            $price = 33.5;
                        }
                    }
                }
            }

            $price1 = "<span style='float:left'>" . 'Price for your choice: ' . $price . ' lei' .
                Html::a('Advance', ['check-out',
                    'id' => $model2->id,
                    'origin' => $origin,
                    'destination' => $destination,
                    'date' => $date,
                    'price' => $price,
                    'fc' => $fc,
                    'sc' => $sc,
                    'train_id' => $train_id,
                    'departure_time' => $departure_time,
                    'arrival_time' => $arrival_time,
                    'distance' => $distance

                ], ['class' => 'btn btn-primary']) . "</span>";


            return $this->render('index',
                [
                    'model' => $trip,
                    'model2' => $model2,
                    'model3' => $model3,
                    'origin' => $origin,
                    'destination' => $destination,
                    'price' => $price,
                    'price1' => $price1,
                    'date' => $date,

                ]);
        }

        return $this->render('index',
            [
                'model' => $trip,
                'model2' => $model2,
                'model3' => $model3,
                'origin' => $origin,
                'destination' => $destination,
                'price' => $price,
                'price1' => $price1,
                'date' => $date,

            ]);
    }

}

?>

