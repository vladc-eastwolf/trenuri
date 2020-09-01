<?php

namespace backend\controllers;

use backend\models\Discount;
use Yii;
use backend\models\RetiredLicense;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RetiredLicenseController implements the CRUD actions for RetiredLicense model.
 */
class RetiredLicenseController extends Controller
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

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $discount = Discount::findOne(['retired_id' => $id]);
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

    protected function findModel($id)
    {
        if (($model = RetiredLicense::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
