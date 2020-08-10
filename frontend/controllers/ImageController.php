<?php

namespace frontend\controllers;

use frontend\models\Image;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\filters\AccessControl;
use Yii;

class ImageController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['open'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionOpen($id)
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
