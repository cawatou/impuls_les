<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemGallery */

$this->title = 'Редактирование: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Галерея товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="item-gallery-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'item_model' => $item_model,
        'file_model' => $file_model,
    ]) ?>

</div>
