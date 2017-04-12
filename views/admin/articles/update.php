<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Articles */

$this->title = 'Редактировать:';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="articles-update">

    <?= $this->render('_form', [
        'model' => $model,
        'file_model' => $file_model,
    ]) ?>

</div>
