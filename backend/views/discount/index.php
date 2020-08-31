<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DiscountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Discounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'user_id',
                'label' => 'User',
                'value' => function ($model) {
                    return $model->user->firstname . ' ' . $model->user->lastname;
                }
            ],
            [
                'attribute' => 'identity_card_id',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->identity_card_id) {
                        if ($model->identityCard->status == 9) {
                            return Html::a('Check photos', ['/identity-card/view', 'id' => $model->identity_card_id]);
                        } else {
                            return 'Checked';
                        }
                    }
                },
                'contentOptions' => function ($model) {
                    return ['style' => 'background-color:'
                        . ($model->identityCard->status == 9
                            ? '#DC143C' : '#32CD32')];
                }

            ],
            [
                'attribute' => 'student_id',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->student_id) {
                        if ($model->student->status == 9) {
                            return Html::a('Check photos', ['/student-license/view', 'id' => $model->student_id]);
                        } else {
                            return 'Checked';
                        }

                    }
                },
                'contentOptions' => function ($model) {
                    return ['style' => 'background-color:'
                        . ((empty($model->student_id) ? '#FFFFFF' : ($model->student_id && $model->student->status == 9 ? '#DC143C' : '#32CD32')))];
                }
            ],
            [
                'attribute' => 'school_id',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->school_id) {
                        if($model->school->status == 9){
                            return Html::a('Check photos', ['/school-license/view', '' => '']);
                        }else
                            return 'Checked';


                    }
                },
                'contentOptions' => function ($model) {
                    return ['style' => 'background-color:'
                        . ((empty($model->school_id) ? '#FFFFFF' : ($model->school_id && $model->school->status == 9 ? '#DC143C' : '#32CD32')))];
                }
            ],
            [
                'attribute' => 'retired_id',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->retired_id) {
                        if($model->retired->status == 9){
                            return Html::a('Check photo', ['/retired-license/view', '' => '']);
                        }else{
                            return 'Checked';
                        }

                    }
                },
                'contentOptions' => function ($model) {
                    return ['style' => 'background-color:'
                        . ((empty($model->retired_id) ? '#FFFFFF' : ($model->retired_id && $model->retired->status == 9 ? '#DC143C' : '#32CD32')))];
                }
            ],
            [
                'attribute' => 'status',
                'label' => 'Status',
                'value' => function ($model) {
                    if ($model->status == 9 || $model->status == 10) {
                        return 'Unapproved';
                    } else {
                        return 'Approved';
                    }
                },
                'contentOptions' => function ($model) {
                    return ['style' => 'background-color:'
                        . ($model->status == 9 || $model->status == 10
                            ? '#DC143C' : '#32CD32')];
                }
            ],
            'send_at',

        ],
    ]); ?>


</div>
