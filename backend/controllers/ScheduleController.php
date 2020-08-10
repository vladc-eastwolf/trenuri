<?php

namespace backend\controllers;

use Yii;
use backend\models\Schedule;
use backend\models\ScheduleSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use yii\web\Response;
use backend\models\Trip;


/**
 * ScheduleController implements the CRUD actions for Schedule model.
 */
class ScheduleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'update', 'delete', 'create1', 'bulk'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'bulk' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Schedule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ScheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Schedule model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


    /**
     * Creates a new Schedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate1()
    {
        $model = new Schedule();
        $model2 = Trip::find()->all();
        if ($model->load(Yii::$app->request->post())) {
            $count = $model->count;
            $trip = $model->trip_id;
            return $this->redirect(['create', 'count' => $count, 'trip' => $trip]);
        }
        return $this->render('create1', ['model' => $model, 'model2' => $model2]);
    }

    public function actionCreate($count, $trip)
    {
        $model2 = Trip::find()->all();
        $model = [];
        $model3 = Trip::findOne(['id' => $trip]);
        for ($i = 0; $i < $count; $i++) {
            $model[] = new Schedule();
        }
        if (isset($_POST['Schedule'])) {
            foreach ($model as $i => $mod) {
                $mod->attributes = $_POST['Schedule'][$i];
                if ($mod->arrival_time) {
                    $mod->arrival_time = $mod->arrival_time . ':00';
                } else {
                    $mod->arrival_time = null;
                }
                if ($mod->departure_time) {
                    $mod->departure_time = $mod->departure_time . ':00';
                } else {
                    $mod->departure_time = null;
                }
                $mod->trip_id = $trip;

                $mod->save();
            }
            return $this->redirect(['index']);
        }


        return $this->render('create', ['model' => $model, 'model2' => $model2, 'model3' => $model3]);
    }


    /**
     * Updates an existing Schedule model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model2 = Trip::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'model2' => $model2
        ]);
    }

    /**
     * Deletes an existing Schedule model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionBulk()
    {
        $selection = (array)Yii::$app->request->post('selection');
        foreach ($selection as $id) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }


    /**
     * Finds the Schedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Schedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Schedule::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
