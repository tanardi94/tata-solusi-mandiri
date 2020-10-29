<?php

use backend\models\ProductCategory;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Categories';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="product-category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'used_by',
                'value' => function ($data) {
                    $com = [
                        'Corporate', 'Commercial & Industrial'
                    ];
                    return $com[$data->used_by];
                },
                'filter' => [
                    'Corporate', 'Commercial & Industrial'
                ]
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
