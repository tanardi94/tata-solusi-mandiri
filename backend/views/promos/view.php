<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Promos */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Promos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="promos-view">

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
            'title',
            [
                'attribute' => 'description',
                'value' => $model->description,
                'format' => 'raw'
            ],
            [
                'attribute' => 'start_date',
                'value' => function ($data) {
                    return date("d F Y", strtotime($data->start_date));
                }
            ],
            [
                'attribute' => 'end_date',
                'value' => function ($data) {
                    return date("d F Y", strtotime($data->end_date));
                }
            ],
            [
                'attribute' => 'use_alert',
                'value' => function($data) {
                    $x = ['No', 'Yes'];
                    return $x[$data->use_alert];
                }
            ],
        ],
    ]) ?>

</div>
