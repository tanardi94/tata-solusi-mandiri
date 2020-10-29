<?php

use backend\models\ProductCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$category = ProductCategory::find()->select(['id', 'name'])->where(['status' => 1])->all();
$arrays = ArrayHelper::toArray($category, [
    'backend\models\ProductCategory', 'id'
]);
$categories = array_combine(ArrayHelper::getColumn($arrays, 'id'), ArrayHelper::getColumn($arrays, 'name'));
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>

</div>
