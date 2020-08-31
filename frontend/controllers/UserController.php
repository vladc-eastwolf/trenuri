<?php

namespace frontend\controllers;

use frontend\models\Discount;
use frontend\models\IdentityCard;
use frontend\models\RetiredLicense;
use frontend\models\SchoolLicense;
use frontend\models\StudentLicense;
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

    public function actionSendDiscountStudent($type)
    {
        $model = new Discount();
        if ($model->load(Yii::$app->request->post())) {
            if ($type == 'student') {
                $student = new StudentLicense();
                $id_card = new IdentityCard();
                if (UploadedFile::getInstance($model, 'imageFile1')) {
                    if (UploadedFile::getInstance($model, 'imageFile2')) {
                        $model->user_id = Yii::$app->user->getId();
                        $image1 = UploadedFile::getInstance($model, 'imageFile1');
                        $image2 = UploadedFile::getInstance($model, 'imageFile2');

                        if (!empty($image1) && !empty($image2)) {
                            $id_card->name = 'id' . Yii::$app->user->getId();
                            $id_card->size = $image1->size;
                            $id_card->extension = $image1->extension;
                            $image1->saveAs(Yii::getAlias('@uploads/identity_card') . '/id' . Yii::$app->user->getId() . '.' . $image1->extension);
                            $id_card->mime_type = FileHelper::getMimeType(Yii::getAlias('@uploads/identity_card') . '/' . $id_card->name . '.' . $id_card->extension);
                            $id_card->save();

                            $model->identity_card_id = $id_card->id;

                            $student->name = 'stud_lic' . Yii::$app->user->getId();
                            $student->size = $image2->size;
                            $student->extension = $image2->extension;
                            $image2->saveAs(Yii::getAlias('@uploads/student_license') . '/stud_lic' . Yii::$app->user->getId() . '.' . $image2->extension);
                            $student->mime_type = FileHelper::getMimeType(Yii::getAlias('@uploads/student_license') . '/' . $student->name . '.' . $student->extension);
                            $student->save();

                            $model->student_id = $student->id;

                            $model->save();

                            $student->save();

                        }
                    }
                }
            }

            return $this->redirect(['profile',
                'id' => Yii::$app->user->getId()
            ]);
        }

        return $this->render('send-discount-student', ['type' => $type,
            'model' => $model]);
    }

    public function actionSendDiscountSchool($type)
    {
        $model = new Discount();
        if ($model->load(Yii::$app->request->post())) {
            if ($type == 'schoolboy') {
                $school = new SchoolLicense();
                $id_card = new IdentityCard();
                if (UploadedFile::getInstance($model, 'imageFile1')) {
                    if (UploadedFile::getInstance($model, 'imageFile2')) {
                        $model->user_id = Yii::$app->user->getId();
                        $image1 = UploadedFile::getInstance($model, 'imageFile1');
                        $image2 = UploadedFile::getInstance($model, 'imageFile2');

                        if (!empty($image1) && !empty($image2)) {
                            $id_card->name = 'id' . Yii::$app->user->getId();
                            $id_card->size = $image1->size;
                            $id_card->extension = $image1->extension;
                            $image1->saveAs(Yii::getAlias('@uploads/identity_card') . '/id' . Yii::$app->user->getId() . '.' . $image1->extension);
                            $id_card->mime_type = FileHelper::getMimeType(Yii::getAlias('@uploads/identity_card') . '/' . $id_card->name . '.' . $id_card->extension);
                            $id_card->save();

                            $model->identity_card_id = $id_card->id;

                            $school->name = 'notebook' . Yii::$app->user->getId();
                            $school->size = $image2->size;
                            $school->extension = $image2->extension;
                            $image2->saveAs(Yii::getAlias('@uploads/notebook') . '/notebook' . Yii::$app->user->getId() . '.' . $image2->extension);
                            $school->mime_type = FileHelper::getMimeType(Yii::getAlias('@uploads/notebook') . '/' . $school->name . '.' . $school->extension);
                            $school->save();

                            $model->school_id = $school->id;

                            $model->save();

                            $school->save();

                        }
                    }
                }
            }

            return $this->redirect(['profile',
                'id' => Yii::$app->user->getId()
            ]);
        }
        return $this->render('send-discount-school', [
            'type' => $type,
            'model'=>$model
        ]);
    }

    public function actionSendDiscountRetired($type)
    {
        $model = new Discount();
        if ($model->load(Yii::$app->request->post())) {
            if ($type == 'retired') {
                $retired = new RetiredLicense();
                $id_card = new IdentityCard();
                if (UploadedFile::getInstance($model, 'imageFile1')) {
                    if (UploadedFile::getInstance($model, 'imageFile2')) {
                        $model->user_id = Yii::$app->user->getId();
                        $image1 = UploadedFile::getInstance($model, 'imageFile1');
                        $image2 = UploadedFile::getInstance($model, 'imageFile2');

                        if (!empty($image1) && !empty($image2)) {
                            $id_card->name = 'id' . Yii::$app->user->getId();
                            $id_card->size = $image1->size;
                            $id_card->extension = $image1->extension;
                            $image1->saveAs(Yii::getAlias('@uploads/identity_card') . '/id' . Yii::$app->user->getId() . '.' . $image1->extension);
                            $id_card->mime_type = FileHelper::getMimeType(Yii::getAlias('@uploads/identity_card') . '/' . $id_card->name . '.' . $id_card->extension);
                            $id_card->save();

                            $model->identity_card_id = $id_card->id;

                            $retired->name = 'notebook' . Yii::$app->user->getId();
                            $retired->size = $image2->size;
                            $retired->extension = $image2->extension;
                            $image2->saveAs(Yii::getAlias('@uploads/notebook') . '/notebook' . Yii::$app->user->getId() . '.' . $image2->extension);
                            $retired->mime_type = FileHelper::getMimeType(Yii::getAlias('@uploads/notebook') . '/' . $retired->name . '.' . $retired->extension);
                            $retired->save();

                            $model->retired_id = $retired->id;
                            $model->save();

                            $retired->save();

                        }
                    }
                }
            }

            return $this->redirect(['profile',
                'id' => Yii::$app->user->getId()
            ]);
        }
        return $this->render('send-discount-retired', [
            'type' => $type,
            'model'=>$model
        ]);
    }

    public function actionDiscount()
    {
        $model = new Discount();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->discount_type == 'student') {
                return $this->redirect(['send-discount-student',
                    'type' => $model->discount_type,
                ]);
            } else if ($model->discount_type == 'schoolboy') {
                return $this->redirect(['send-discount-school',
                    'type' => $model->discount_type,
                ]);
            }else if($model->discount_type == 'retired'){
                return $this->redirect(['send-discount-retired',
                    'type' => $model->discount_type,
                ]);
            }
        }

        return $this->render('discount', [
            'model' => $model
        ]);
    }


    public function actionProfile($id)
    {
        $model = User::findOne($id);
        if (!$model->image_id) {
            $model2 = new Image();
            $old_image = NULL;
        } else {
            $model2 = Image::findOne(['user_id' => $id]);
            $old_image = $model2->name;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (UploadedFile::getInstance($model, 'imageFile')) {
                $model2->user_id = $id;
                $image = UploadedFile::getInstance($model, 'imageFile');
                if (!empty($image) && $image->size !== 0) {
                    if ($old_image) {
                        unlink(Yii::getAlias('@uploads') . '/' . $model2->name . '.' . $model2->extension);
                    }
                    $model2->extension = $image->extension;
                    $model2->size = $image->size;
                    $model2->save();
                    $model2->name = 'image' . $model2->id;
                    $image->saveAs(Yii::getAlias('@uploads') . '/image' . $model2->id . '.' . $image->extension);
                    $model2->mime_type = FileHelper::getMimeType(Yii::getAlias('@uploads') . '/' . $model2->name . '.' . $model2->extension);
                } else {
                    $model2->name = $old_image;
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
