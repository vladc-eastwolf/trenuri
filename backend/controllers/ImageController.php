<?php

namespace backend\controllers;

use backend\models\Discount;
use backend\models\IdentityCard;
use backend\models\RetiredLicense;
use backend\models\SchoolLicense;
use backend\models\StudentLicense;
use yii\filters\AccessControl;
use Yii;
use yii\filters\VerbFilter;
use backend\models\Image;
use backend\models\ImageSearch;
use yii\web\NotFoundHttpException;

class ImageController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['student-open', 'school-open', 'retired-open', 'id-open','profile-open', 'index', 'bulk', 'delete', 'view'],
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
        $searchModel = new ImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDelete($id)
    {

        $model=$this->findModel($id);
        unlink(Yii::getAlias('@uploads') . '/' . $model->name . '.' . $model->extension);
        $model->delete();

        return $this->redirect(['index']);
    }

    public function actionBulk()
    {

        $selection = (array)Yii::$app->request->post('selection');
        foreach ($selection as $id) {
            $model = $this->findModel($id);
            $this->findModel($id)->delete();
            unlink(Yii::getAlias('@uploads') . '/' . $model->name . '.' . $model->extension);
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Image::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionStudentOpen($id)
    {
        if ($model = StudentLicense::findOne($id)) {
            if (file_exists(Yii::getAlias('@uploads') . '/student_license/' . $model->name . '.' . $model->extension)) {
                header('Content-Type: ' . $model->mime_type);
                header('Content-Disposition: inline; filename="' . $model->name . '.' . $model->extension . '"');
                $content = file_get_contents(Yii::getAlias('@uploads') . '/student_license/' . $model->name . '.' . $model->extension);
                if ($model->size) $size = $model->size;
                else $size = strlen($content);
                if ($size) {
                    header('Content-Length: ' . $size);
                }
                die($content);
            }
        }
    }

    public function actionSchoolOpen($id)
    {
        if ($model = SchoolLicense::findOne($id)) {
            if (file_exists(Yii::getAlias('@uploads') . '/notebook/' . $model->name . '.' . $model->extension)) {
                header('Content-Type: ' . $model->mime_type);
                header('Content-Disposition: inline; filename="' . $model->name . '.' . $model->extension . '"');
                $content = file_get_contents(Yii::getAlias('@uploads') . '/notebook/' . $model->name . '.' . $model->extension);
                if ($model->size) $size = $model->size;
                else $size = strlen($content);
                if ($size) {
                    header('Content-Length: ' . $size);
                }
                die($content);
            }
        }
    }

    public function actionRetiredOpen($id)
    {
        if ($model = RetiredLicense::findOne($id)) {
            if (file_exists(Yii::getAlias('@uploads') . '/retired/' . $model->name . '.' . $model->extension)) {
                header('Content-Type: ' . $model->mime_type);
                header('Content-Disposition: inline; filename="' . $model->name . '.' . $model->extension . '"');
                $content = file_get_contents(Yii::getAlias('@uploads') . '/retired/' . $model->name . '.' . $model->extension);
                if ($model->size) $size = $model->size;
                else $size = strlen($content);
                if ($size) {
                    header('Content-Length: ' . $size);
                }
                die($content);
            }
        }
    }

    public function actionIdOpen($id)
    {
        if ($model = IdentityCard::findOne($id)) {
            if (file_exists(Yii::getAlias('@uploads') . '/identity_card/' . $model->name . '.' . $model->extension)) {
                header('Content-Type: ' . $model->mime_type);
                header('Content-Disposition: inline; filename="' . $model->name . '.' . $model->extension . '"');
                $content = file_get_contents(Yii::getAlias('@uploads') . '/identity_card/' . $model->name . '.' . $model->extension);
                if ($model->size) $size = $model->size;
                else $size = strlen($content);
                if ($size) {
                    header('Content-Length: ' . $size);
                }
                die($content);
            }
        }
    }

    public function actionProfileOpen($id)
    {
        if ($model = Image::findOne($id)) {
            if (file_exists(Yii::getAlias('@uploads') . '/' . $model->name . '.' . $model->extension)) {
                header('Content-Type: ' . $model->mime_type);
                header('Content-Disposition: inline; filename="' . $model->name . '.' . $model->extension . '"');
                $content = file_get_contents(Yii::getAlias('@uploads') . '/' . $model->name . '.' . $model->extension);
                if ($model->size) $size = $model->size;
                else $size = strlen($content);
                if ($size) {
                    header('Content-Length: ' . $size);
                }
                die($content);
            }
        }
    }


}
