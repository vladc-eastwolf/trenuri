<?php

namespace backend\controllers;

use backend\models\IdentityCard;
use backend\models\RetiredLicense;
use backend\models\SchoolLicense;
use backend\models\StudentLicense;
use backend\models\User;
use Yii;
use backend\models\Discount;
use backend\models\DiscountSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiscountController implements the CRUD actions for Discount model.
 */
class DiscountController extends Controller
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
                        'actions' => ['index', 'delete', 'bulk'],
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

    /**
     * Lists all Discount models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiscountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
            if ($model->identity_card_id) {
                $id_card = IdentityCard::findOne($model->identity_card_id);
                unlink(Yii::getAlias('@uploads') . '/identity_card/' . $id_card->name . '.' . $id_card->extension);
                $id_card->delete();
            }
            if ($model->student_id) {
                $student = StudentLicense::findOne($model->student_id);
                unlink(Yii::getAlias('@uploads') . '/student_license/' . $student->name . '.' . $student->extension);
                $student->delete();
            }
            if ($model->school_id) {
                $school=SchoolLicense::findOne($model->school_id);
                unlink(Yii::getAlias('@uploads') . '/notebook/' . $school->name . '.' . $school->extension);
                $school->delete();
            }
            if ($model->retired_id) {
                $retired=RetiredLicense::findOne($model->retired_id);
                unlink(Yii::getAlias('@uploads') . '/retired/' . $retired->name . '.' . $retired->extension);
                $retired->delete();
            }
            $user=User::findOne($model->user_id);
            $user->discount=null;
            $user->save();
            $model->delete();
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Discount::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
