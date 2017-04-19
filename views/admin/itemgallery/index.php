<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemgallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Галерея товара';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-gallery-index">
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать новый элемент', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'item_id',
            [
                'label' => 'Картинка',
                'format' => 'raw',
                'value' => function($data){
                    return Html::img(Url::toRoute($data->img),[
                        'style' => 'width:60px;'
                    ]);
                },
            ],

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',],
        ],
    ]); ?>
</div>
