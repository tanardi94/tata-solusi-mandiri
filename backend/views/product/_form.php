<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use dosamigos\tinymce\TinyMce;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

<?php $form = ActiveForm::begin(['id' => 'dynamic-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
<?= $form->field($model, 'category')->dropDownList($categories) ?>

<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'overview')->widget(TinyMce::className(), [
    'options' => ['rows' => 10],
    'language' => 'en',
    'clientOptions' => [
        'plugins' => [
            "advlist autolink lists link charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    ]
]);?>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-picture"></i> Upload Images</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'id' => 'checking',
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 5, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $images[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'imageFile',
                    'seq'
                ],
            ]); ?>

            <div class="container-items col-sm-6"><!-- widgetContainer -->
            <?php foreach ($images as $i => $image): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left"></h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $image->isNewRecord) {
                                echo Html::activeHiddenInput($image, "[{$i}]id");
                            }
                        ?>
                        <!-- < $form->field($image, "[{$i}]full_name")->textInput(['maxlength' => true]) ?> -->
                        <div class="row">
                            <div class="col-sm-6">
                                <?php
                                
                                if (empty($image->image)) {
                                    echo $form->field($image, "[{$i}]imageFiles[]")->widget(FileInput::class, [
                                        'options' => ['accept' => 'image/*'],
                                    ]);
                                }
                                else {
                                    echo '<div class="form-group">
                                    <h5><b>Image</b></h5>';
                                    echo Html::img(Yii::getAlias('@web/uploads/product/') . $image->image, [
                                        'alt'=>Yii::t('app', 'Product for ') . $model->name,
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
                                        Url::to(['/product/delimage', 'id'=>$image->id]),
                                        ['class' => 'btn btn-primary']
                                    );
                                    echo '</div>';
                                }?>
                            </div>
                        </div><!-- .row -->
                        <!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php 
    $this->registerJs('
    $(".dynamicform_wrapper").on("beforeInsert", function(e, item) {
        console.log("beforeInsert");
    });
    
    $(".dynamicform_wrapper").on("afterInsert", function(e, item) {
        console.log("afterInsert");
    });
    
    $(".dynamicform_wrapper").on("beforeDelete", function(e, item) {
        if (! confirm("Are you sure you want to delete this item?")) {
            return false;
        }
        return true;
    });
    
    $(".dynamicform_wrapper").on("afterDelete", function(e) {
        console.log("Deleted item!");
    });
    
    $(".dynamicform_wrapper").on("limitReached", function(e, item) {
        alert("Limit reached");
    });
    
    $("#checking").click(function() {
        $(".file-preview-frame").removeAttr("id");
      });
    ');

    
    ?>

</div>
