<?php

use backend\models\Product;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductImages */
/* @var $form yii\widgets\ActiveForm */

$product = Product::find()->all();
$arrays = ArrayHelper::toArray($product, [
    'backend\models\Product', 'id'
]);
$products = array_combine(ArrayHelper::getColumn($arrays, 'id'), ArrayHelper::getColumn($arrays, 'name'));
?>

<div class="product-images-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList($products) ?>

    <?php
    if (empty($model->image)) {
        echo $form->field($model, "imageFile")->widget(FileInput::class, [
            'options' => ['accept' => 'image/*'],
        ]);
    }
    else {
        echo '<div class="form-group">
        <h5><b>Image</b></h5>';
        echo Html::img(Yii::getAlias('@web/uploads/product/') . $model->image, [
            'alt'=>Yii::t('app', 'Image for product'),
            'title'=>Yii::t('app', 'Click remove button below to remove this image'),
            'class'=>'file-preview-image',
            'width' => 200,
            'height' => 200
            // add a CSS class to make your image styling consistent
        ]);
        echo '</div>
        <div class="form-group">';
        echo Html::a(
            Yii::t('app', 'Change Image'), 
            Url::to(['/product/delimage', 'id'=>$model->id]),
            ['class' => 'btn btn-primary']
        );
        echo '</div>';
    }?>

    <div class="form-group">
        <?= Html::submitButton(($model->isNewRecord ? 'Create' : 'Update'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
