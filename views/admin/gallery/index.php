<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Галерея';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">
    <?// echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
	    'id',            
            'title',            
            'catName',
            [
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function($data){
		    return Html::img(Url::toRoute($data->src),[
			'style' => 'width:60px;'
		    ]);
		},
	    ],
            

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{update} {delete}',],
        ],
    ]); ?>
</div>
