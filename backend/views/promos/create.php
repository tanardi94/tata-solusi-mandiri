<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Promos */

$this->title = 'Create Promos';
$this->params['breadcrumbs'][] = ['label' => 'Promos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
