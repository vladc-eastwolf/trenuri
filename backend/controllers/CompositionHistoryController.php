<?php

namespace backend\controllers;

use backend\models\Composition;
use Yii;
use backend\models\CompositionHistory;
use backend\models\CompositionHistorySearch;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompositionHistoryController implements the CRUD actions for CompositionHistory model.
 */
class CompositionHistoryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CompositionHistory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompositionHistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model2=Composition::find()->all();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model2'=>$model2
        ]);
    }

    /**
     * Displays a single CompositionHistory model.
     * @param integer $composition_id
     * @param string $update_time
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    /**
     * Creates a new CompositionHistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CompositionHistory();
        $model2=Composition::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            $model->update_time = new Expression('NOW()');
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'model2'=>$model2
        ]);
    }

    /**
     * Updates an existing CompositionHistory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $composition_id
     * @param string $update_time
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($composition_id, $update_time)
    {
        $model = $this->findModel($composition_id, $update_time);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CompositionHistory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $composition_id
     * @param string $update_time
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($composition_id, $update_time)
    {
        $this->findModel($composition_id, $update_time)->delete();

        return $this->redirect(['index']);
    }

    public function actionBulk()
    {
        $selection = [Yii::$app->request->post('selection')];
        for ($i = 0; $i < sizeof($selection); $i++) {
            foreach ($selection[$i] as $id) {
               die;
            }
        }


        return $this->redirect(['index']);
    }

    /**
     * Finds the CompositionHistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $composition_id
     * @param string $update_time
     * @return CompositionHistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($composition_id, $update_time)
    {
        if (($model = CompositionHistory::findOne(['composition_id' => $composition_id, 'update_time' => $update_time])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
