<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::beginForm(['contact/bulk'], 'post'); ?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div style="padding-bottom: 25px">

        <div style="float:right">
            <?= Html::submitButton('Delete', [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ]]); ?>
        </div>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'options' => ['style' => 'width:30px']
            ],
            [
                'class' => 'yii\grid\CheckboxColumn',
                'options' => ['style' => 'width:30px']
            ],

            'name',
            'email:email',
            'subject',
            [
                'attribute' => 'status',
                'label' => 'Status',
                'value' => function ($model) {
                    if ($model->status == 0) {
                        return 'Unsolved';
                    } else {
                        return 'Solved';
                    }
                },
                'contentOptions' => function ($model) {
                    return ['style' => 'background-color:'
                        . ($model->status == 0
                            ? '#DC143C' : '#32CD32')];
                }
            ],
            [
                'attribute' => 'body',
                'options' => ['style' => 'width:350px']
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>
</div>


<?php Html::endForm(); ?>
