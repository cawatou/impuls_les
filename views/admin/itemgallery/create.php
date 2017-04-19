<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ItemGallery */

$this->title = 'Создание элемента галереи';
$this->params['breadcrumbs'][] = ['label' => 'Галерея товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-gallery-create">

    <?= $this->render('_form', [
        'model' => $model,
        'item_model' => $item_model,
        'file_model' => $file_model,
    ]) ?>

</div>
<?//echo "<pre>".print_r($item_model, 1)."</pre>";?>