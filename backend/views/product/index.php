<?php

use backend\models\ProductCategory;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'overview:ntext',
            
            [
                'attribute' => 'category',
                'value' => function ($data) {
                    $category = ProductCategory::find()->select(['id', 'name'])->where(['status' => 1])->all();
                    $arrays = ArrayHelper::toArray($category, [
                        'backend\models\ProductCategory', 'id'
                    ]);
                    $categories = array_combine(ArrayHelper::getColumn($arrays, 'id'), ArrayHelper::getColumn($arrays, 'name'));
                    return $categories[$data->category];
                },
                'filter' => $categories
            ] ,

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
