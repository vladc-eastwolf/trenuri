<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <?= Html::beginForm(['user/bulk'], 'post'); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <div style="float:right; padding-bottom: 15px">
        <?= Html::submitButton('Delete', [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ]]); ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'options' => ['style' => 'width:30px']
            ],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'options' => ['style' => 'width:30px']
            ],
            'firstname',
            'lastname',
            'phone',
            'image_id',
            'email:email',
            [
                'attribute' => 'status',
                'label' => 'Status',
                'value' => function ($model) {
                    if ($model->status == 9) {
                        return 'Inactive';
                    } else {
                        return 'Active';
                    }
                }
            ],
            'discount',
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s', $model->created_at);

                }
            ],
            [
                'attribute' => 'updated_at',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s', $model->updated_at);

                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}{delete}'
            ],
        ],
    ]); ?>


</div>
<?php Html::endForm(); ?>