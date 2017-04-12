<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'title',
            'description:ntext',
             [
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function($data){
		    return Html::img(Url::toRoute($data->img),[
			'style' => 'width:60px;'
		    ]);
		},
	    ],
            // 'link',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}',]
        ],
        'options' => ['style' => 'width: 25;'],

    ]); ?>
</div>
