<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView
/* @var $this yii\web\View */
?>
<h1>Слайдер на главной</h1>
<div class="slider-form">
 <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [            
               
            [
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function($data){
		    return Html::img(Url::toRoute($data->img),[
			'style' => 'width:60px;'
		    ]);
		},
	    ],
            'title', 

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{update}',],
        ],
    ]); ?>
</div>