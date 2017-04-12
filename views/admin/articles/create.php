<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Articles */

$this->title = 'Добавить статью';
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-create">

    <?= $this->render('_form', [
        'model' => $model,
        'file_model' => $file_model,
    ]) ?>

</div>
