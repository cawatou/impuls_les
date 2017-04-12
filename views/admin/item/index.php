<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">
    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
	    'name',
            [
		'label' => 'Картинка',
		'format' => 'raw',
		'value' => function($data){
		    if($data->img == "none") return '<img src="/upload/noimage.png" width=60>';
		    return Html::img(Url::toRoute($data->img),[
			'style' => 'width:60px;'
		    ]);
		},
	    ],
           
            'manufacturer',
            'wood',
            'wet',
            //'size',
            'grade',
            'price',
            // 'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
