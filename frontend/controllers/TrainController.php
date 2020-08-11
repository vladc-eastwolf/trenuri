<?php

namespace frontend\controllers;

use frontend\models\OperationalInterval;
use frontend\models\Schedule;
use frontend\models\Station;
use frontend\models\Train;
use Yii;
use yii\helpers\ArrayHelper;
use frontend\models\Line;
use frontend\models\Trip;
use yii\base\Model;


class TrainController extends \yii\web\Controller
{

    public function actionMyTrain()
    {
        $model = new Line;
        if ($model->load(Yii::$app->request->post())) {
            $train_code = $model->number;
            return $this->redirect(['my-train-view', 'train_code' => $train_code]);
        }

        return $this->render('my-train', ['model' => $model]);
    }

    public function actionMyTrainView($train_code)
    {
        $model = Train::findAll(['number' => $train_code]);
        $model2=[];
        $model3=[];
        if ($model) {
            foreach ($model as $id) {
                $model2[] = Trip::find()->where(['train_id' => $id->id])->orderBy(['departure_time'=>SORT_ASC])->all();
            }
            for ($i=0; $i<sizeof($model2);$i++){
                foreach($model2[$i] as $trip){
                    $model3[] = Schedule::find()->where(['trip_id' => $trip->id])->all();
                    $model4 = Line::findAll(['id' => $trip->line_id]);
                }
            }
            return $this->render('my-train-view', ['model' => $model, 'model2' => $model2, 'model3' => $model3, 'model4' => $model4]);
        } else {
            return $this->render('/train/no-train');
        }

    }

    public function actionIndex()
    {
        $model = new Station;
        if ($model->load(Yii::$app->request->post())) {
            $origin = $model->origin;
            $destination = $model->destination;
            $date = $model->date;
            return $this->redirect(['view', 'origin' => $origin, 'destination' => $destination, 'date' => $date]);
        }
        $data = ArrayHelper::map(Station::find()->select(['name'])->all(), 'name', 'name');

        return $this->render('index', ['model' => $model, 'data' => $data]);
    }

    public function actionView($origin, $destination, $date)
    {

        $model1 = Station::findOne(['name' => $origin]);
        $model2 = Station::findOne(['name' => $destination]);
        $model6[] = OperationalInterval::find()->where(['<=', 'start_date', $date])->andWhere(['>=', 'end_date', $date])->all();
        $lista = []; //schedule
        $trenuri = []; // tipul de tren
        $model4 = []; //tripuri


        if ($model1 && $model2 && $model6) {
            $model3 = Line::find()->where(['departure_station_id' => $model1->id, 'arrival_station_id' => $model2->id])->all();
            foreach ($model3 as $line) {
                for ($i = 0; $i < sizeof($model6); $i++) {
                    foreach ($model6[$i] as $interval) {
                        if ((date('D', strtotime($date)) == 'Mon')) {
                            if ($interval->monday == 1) {
                                $model4[] = Trip::find()->where(['operational_interval_id' => $interval->id])->andWhere(['line_id' => $line->id])->orderBy(['departure_time'=>SORT_ASC])->all();
                            }
                        }
                        if ((date('D', strtotime($date)) == 'Tue')) {
                            if ($interval->tuesday == 1) {
                                $model4[] = Trip::find()->where(['operational_interval_id' => $interval->id])->andWhere(['line_id' => $line->id])->orderBy(['departure_time'=>SORT_ASC])->all();
                            }
                        }
                        if ((date('D', strtotime($date)) == 'Wed')) {
                            if ($interval->wednesday == 1) {
                                $model4[] = Trip::find()->where(['operational_interval_id' => $interval->id])->andWhere(['line_id' => $line->id])->orderBy(['departure_time'=>SORT_ASC])->all();
                            }
                        }
                        if ((date('D', strtotime($date)) == 'Thu')) {
                            if ($interval->thursday == 1) {
                                $model4[] = Trip::find()->where(['operational_interval_id' => $interval->id])->andWhere(['line_id' => $line->id])->orderBy(['departure_time'=>SORT_ASC])->all();
                            }
                        }
                        if ((date('D', strtotime($date)) == 'Fri')) {
                            if ($interval->friday == 1) {
                                $model4[] = Trip::find()->where(['operational_interval_id' => $interval->id])->andWhere(['line_id' => $line->id])->orderBy(['departure_time'=>SORT_ASC])->all();
                            }
                        }
                        if ((date('D', strtotime($date)) == 'Sat')) {
                            if ($interval->saturday == 1) {
                                $model4[] = Trip::find()->where(['operational_interval_id' => $interval->id])->andWhere(['line_id' => $line->id])->orderBy(['departure_time'=>SORT_ASC])->all();
                            }
                        }
                        if ((date('D', strtotime($date)) == 'Sun')) {
                            if ($interval->sunday == 1) {
                                $model4[] = Trip::find()->where(['operational_interval_id' => $interval->id])->andWhere(['line_id' => $line->id])->orderBy(['departure_time'=>SORT_ASC])->all();
                            }
                        }
                    }
                }
            }

            for ($i = 0; $i < sizeof($model4); $i++) {
                foreach ($model4[$i] as $trip) {
                    $lista[] = Schedule::find()->where(['trip_id' => $trip->id])->all();
                    $trenuri[] = Train::find()->where(['id' => $trip->train_id])->all();
                }
            }


            return $this->render('view', [
                'model1' => $model1,
                'model2' => $model2,
                'model3' => $model3,
                'model4' => $model4,
                'destination' => $destination,
                'model6' => $model6,
                'origin' => $origin,
                'date' => $date,
                'lista' => $lista,
                'trenuri' => $trenuri,
            ]);
        } else {
            return $this->render('/train/no-train');
        }
    }


}
