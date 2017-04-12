<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            //'img:image',
            /*[
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function($data){
		    return Html::img(Url::toRoute($data->img),[
			'style' => 'width:60px;'
		    ]);
		},
	    ],*/
	    
	    [
            'label' => 'Описание',
            'format' => 'raw',
            'value' => function($data){
		    return mb_substr($data->description, 0, 100, 'UTF-8')." ...";
		},
	    ],
	    
           // 'description',
            

            ['class' => 'yii\grid\ActionColumn',
             'template' => ' {update}',],
        ],
        'options' => ['style' => 'width: 25;'],
    ]); ?>
</div>
