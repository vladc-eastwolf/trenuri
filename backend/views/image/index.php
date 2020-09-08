<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profile Images';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="image-index">
        <?= Html::beginForm(['image/bulk'], 'post'); ?>
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
                'id',
                [
                    'class' => 'yii\grid\CheckboxColumn',
                    'options' => ['style' => 'width:30px']
                ],
                'name',
                'size',
                'extension',
                'mime_type',
                'user_id',
                'created_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
<?php Html::endForm(); ?>