<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            
            //'slug',
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
	    
	    'title',
	    
	    [
		'label' => 'Описание',
		'format' => 'raw',
		'value' => function($data){
		    if(mb_strlen($data->description) > 100) return mb_substr($data->description, 0, 100, 'UTF-8')." ...";
		    return $data->description;
		},
	    ],
             'date',

            ['class' => 'yii\grid\ActionColumn',
             'template' => ' {update} {delete}',],
        ],
    ]); ?>
</div>
