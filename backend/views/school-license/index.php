<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SchoolLicenseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'School Licenses';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="school-license-index">

        <?= Html::beginForm(['school-license/bulk'], 'post'); ?>

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
                'name',
                'size',
                'extension',
                'mime_type',
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

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{delete}'
                ],
            ],
        ]); ?>


    </div>
<?php Html::endForm(); ?>