<?php

use backend\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductImages */

$this->params['breadcrumbs'][] = ['label' => 'Product Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$product = Product::find()->all();
$arrays = ArrayHelper::toArray($product, [
    'backend\models\Product', 'id'
]);
$products = array_combine(ArrayHelper::getColumn($arrays, 'id'), ArrayHelper::getColumn($arrays, 'name'));
$this->title = $products[$model->product_id];
?>
<div class="product-images-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'label' => 'Product',
                'attribute' => 'product_id',
                'value' => function($data) {
                    $product = Product::find()->all();
                    $arrays = ArrayHelper::toArray($product, [
                        'backend\models\Product', 'id'
                    ]);
                    $products = array_combine(ArrayHelper::getColumn($arrays, 'id'), ArrayHelper::getColumn($arrays, 'name'));
                    return $products[$data->product_id];
                },
                'filter' => $products
            ],
            [
                'attribute' => 'image',
                'value' => $model->imageUrl,
                'format' => ['image', ['width' => '70px', 'height' => '70px']],
            ],
            'seq',
        ],
    ]) ?>

</div>
