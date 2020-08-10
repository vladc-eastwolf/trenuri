<?php

namespace frontend\controllers;

use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use frontend\models\EmailResetRequestForm;
use frontend\models\User;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\VarDumper;
use yii\web\BadRequestHttpException;
use frontend\models\ResetEmailForm;
use frontend\models\Image;
use yii\web\UploadedFile;

class UserController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['profile'],
                'rules' => [
                    [
                        'actions' => ['profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }


    public function actionProfile($id)
    {
        $model = User::findOne($id);
        if(!$model->image_id){
            $model2=new Image();
            $old_image=NULL;
        }else{
            $model2=Image::findOne(['user_id'=>$id]);
            $old_image=$model2->name;
        }
        if($model->load(Yii::$app->request->post()) && $model->save()){
            if(UploadedFile::getInstance($model,'imageFile')){
                $model2->user_id=$id;
                $image=UploadedFile::getInstance($model,'imageFile');
                if(!empty($image) && $image->size !==0){
                    unlink(Yii::getAlias('@uploads') . '/' . $model2->name . '.' . $model2->extension);
                    $model2->extension = $image->extension;
                    $model2->size = $image->size;
                    $model2->name = 'image' . $model2->id;
                    $image->saveAs(Yii::getAlias('@uploads') . '/image' . $model2->id . '.' . $image->extension);
                    $model2->mime_type = FileHelper::getMimeType(Yii::getAlias('@uploads') . '/' . $model2->name . '.' . $model2->extension);
                }else{
                    $model2->name=$old_image;
                }
                $model2->save();
                $model->image_id = $model2->id;
            }
            if ($model->newPassword) {
                if (Yii::$app->security->validatePassword($model->oldPassword, $model->password_hash)) {

                    if ($model->newPassword == $model->confirmNewPassword) {
                        $password = Yii::$app->security->generatePasswordHash($model->newPassword);
                        $model->password_hash = $password;

                    }
                }
            }

            if ($model->save() && $model2->save()) {
                Yii::$app->session->setFlash('success', 'Profile updated successfully');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error updating your profile');
            }

            return $this->redirect(['profile', 'id' => $id]);

        }


        if (isset($model->id) && Yii::$app->user->getId() == $model->id) {
            return $this->render('profile', ['model' => $model]);
        } else {
            return $this->redirect(['/user/profile', 'id' => Yii::$app->user->getId()]);

        }
    }

//    public function actionUpdate($id)
//    {
//        $model = User::findOne($id);
//
//        if (!$model->image_id) {
//            $model2 = new Image();
//            $old_image = NULL;
//        } else {
//            $model2 = Image::findOne(['user_id' => $id]);
//            $old_image = $model2->name;
//        }
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            if (UploadedFile::getInstance($model, 'imageFile')) {
//                $model2->user_id = $id;
//                $image = UploadedFile::getInstance($model, 'imageFile');
//                if (!empty($image) && $image->size !== 0) {
//                    if ($old_image) {
//                        unlink(Yii::getAlias('@uploads') . '/' . $model2->name . '.' . $model2->extension);
//                    }
//                    $model2->extension = $image->extension;
//                    $model2->size = $image->size;
//                    $model2->name = 'image' . $model2->id;
//                    $image->saveAs(Yii::getAlias('@uploads') . '/image' . $model2->id . '.' . $image->extension);
//                    $model2->mime_type = FileHelper::getMimeType(Yii::getAlias('@uploads') . '/' . $model2->name . '.' . $model2->extension);
//                } else {
//                    $model2->name = $old_image;
//                }
//                $model2->save();
//                $model->image_id = $model2->id;
//            }
//            if ($model->newPassword) {
//                if (Yii::$app->security->validatePassword($model->oldPassword, $model->password_hash)) {
//
//                    if ($model->newPassword == $model->confirmNewPassword) {
//                        $password = Yii::$app->security->generatePasswordHash($model->newPassword);
//                        $model->password_hash = $password;
//
//                    }
//                }
//            }
//
//            if ($model->save() && $model2->save()) {
//                Yii::$app->session->setFlash('success', 'Profile updated successfully');
//            } else {
//                Yii::$app->session->setFlash('error', 'There was an error updating your profile');
//            }
//
//            return $this->redirect(['profile', 'id' => $id]);
//        }
//
//        if (isset($model->id) && Yii::$app->user->getId() == $model->id) {
//            return $this->render('update', ['model' => $model, 'model2' => $model2]);
//        } else {
//            return $this->redirect(['/user/profile', 'id' => Yii::$app->user->getId()]);
//        }
//
//    }

//    public function actionResetEmail($id)
//    {
//        $model = User::findOne($id);
//        if ($model->load(Yii::$app->request->post())) {
//            $message = Yii::$app->mailer->compose();
//            $message->setFrom('from@domain.com')
//                ->setTo($model->email)
//                ->setSubject('Testing')
//                ->send();
//            if ($message->send()){
//                Yii::$app->session->setFlash('success', "Mail succesfully sent.");
//            }else{
//                Yii::$app->session->setFlash('error', "There was an error.");
//            }
//            return $this->redirect(['profile','id'=>$id]);
//        }
//
//
//        return $this->render('reset-email', ['model' => $model]);
//    }

    public function actionResetEmail($token)
    {
        try {
            $model = new ResetEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetEmail()) {
            Yii::$app->session->setFlash('success', 'Email Updated.');

            return $this->goHome();
        }

        return $this->render('reset-email', [
            'model' => $model,
        ]);
    }

    public function actionRequestEmailReset()
    {
        $model = new EmailResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestEmailResetToken', [
            'model' => $model,
        ]);
    }

}
