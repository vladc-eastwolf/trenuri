<?php

namespace backend\controllers;

use backend\models\Line;
use backend\models\LineSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class LineController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create','update','delete','bulk'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'bulk'=>['POST']
                ],
            ],
        ];
    }
    public function actionCreate()
    {
        $model = new Line();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $model = Line::findOne($id);
        $model->delete();
        return $this->redirect(['index']);
    }

    public function actionIndex()
    {
        $searchModel = new LineSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get());
        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
    }

    public function actionUpdate($id)
    {
        $model = Line::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('update', ['model' => $model]);
    }
    public function actionBulk(){
        $selection = (array)Yii::$app->request->post('selection');
        foreach ($selection as $id) {
            $this->findModel($id)->delete();
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Line::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
