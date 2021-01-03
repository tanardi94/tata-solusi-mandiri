<?php

use backend\models\ProductCategory;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

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
            'name',
            [
                'attribute' => 'description',
                'value' => $model->description,
                'format' => 'raw'
            ],
            [
                'attribute' => 'overview',
                'value' => $model->overview,
                'format' => 'raw'
            ],
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
            ],
        ],
    ]) ?>

</div>
