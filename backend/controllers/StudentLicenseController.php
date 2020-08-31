<?php

namespace backend\controllers;

use backend\models\Discount;
use Yii;
use backend\models\StudentLicense;
use backend\models\StudentLicenseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentLicenseController implements the CRUD actions for StudentLicense model.
 */
class StudentLicenseController extends Controller
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
        $discount = Discount::findOne(['student_id' => $id]);
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

    /**
     * Finds the StudentLicense model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StudentLicense the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StudentLicense::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
