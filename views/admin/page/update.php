<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = 'Редактирование Страницы: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="page-update">

    <?= $this->render('_form', [
        'model' => $model,
        'file_model' => $file_model,
    ]) ?>

</div>
