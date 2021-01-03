<?php

use backend\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductDetails */
/* @var $form yii\widgets\ActiveForm */

$product = Product::find()->all();
$arrays = ArrayHelper::toArray($product, [
    'backend\models\Product', 'id'
]);
$products = array_combine(ArrayHelper::getColumn($arrays, 'id'), ArrayHelper::getColumn($arrays, 'name'));
?>

<div class="product-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList($products) ?>

    <!-- <?= $form->field($model, 'level')->textInput() ?> -->

    <?= $form->field($model, 'specification')->dropDownList(['No', 'Yes']) ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
