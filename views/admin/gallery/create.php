<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gallery */

$this->title = 'Создание нового элемента галереи:';
$this->params['breadcrumbs'][] = ['label' => 'Галерея', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-create">

    <?= $this->render('_form', [
        'model' => $model,
        'model_cat' => $model_cat,
        'file_model' => $file_model,
    ]) ?>

</div>
