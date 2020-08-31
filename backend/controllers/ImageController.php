<?php

namespace backend\controllers;

use backend\models\Discount;
use backend\models\IdentityCard;
use backend\models\StudentLicense;
use yii\filters\AccessControl;
use Yii;

class ImageController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['front-open'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
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
    public function actionBackOpen($discount_id)
    {
        if ($model = StudentLicense::findOne($discount_id)) {
            $content1 = file_get_contents(Yii::getAlias('@uploads') . '/student_license/' . $model->license_back);
            die($content1);

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

}
