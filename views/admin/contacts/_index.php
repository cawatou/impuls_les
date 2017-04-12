<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'title',
            'address',
            'phone',
            'email:email',
            // 'map',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{update}',],
            
        ],
    ]); ?>
</div>
