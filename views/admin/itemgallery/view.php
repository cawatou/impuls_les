<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ItemGallery */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Галерея товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-gallery-view">

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
        <a class="btn btn-success" href="/admin/itemgallery/create">Создать новый элемент</a>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'item_id',
            'img:image',
        ],
    ]) ?>

</div>
