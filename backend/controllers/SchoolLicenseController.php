<?php

namespace backend\controllers;

use backend\models\Discount;
use backend\models\SchoolLicenseSearch;
use Yii;
use backend\models\SchoolLicense;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SchoolLicenseController implements the CRUD actions for SchoolLicense model.
 */
class SchoolLicenseController extends Controller
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
                        'actions' => ['index', 'view', 'delete', 'bulk'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'bulk' => ['POST']
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new SchoolLicenseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $discount = Discount::findOne(['school_id' => $id]);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $discount->status = $discount->status + 1;
            $discount->save();
            return $this->redirect(['discount/index']);
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionBulk()
    {
        $selection = (array)Yii::$app->request->post('selection');
        foreach ($selection as $id) {
            $model = $this->findModel($id);
            $this->findModel($id)->delete();
            unlink(Yii::getAlias('@uploads') . '/notebook/' . $model->name . '.' . $model->extension);
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = SchoolLicense::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
