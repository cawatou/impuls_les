<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = 'Редактировать: ';
$this->params['breadcrumbs'][] = ['label' => 'Товар', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="item-update">

    <?= $this->render('_form', [
        'model' => $model,
        'cat_model' => $cat_model,
        'file_model' => $file_model,
        'price_model' => $price_model,
        'grade_model' => $grade_model,
    ]) ?>

</div>
