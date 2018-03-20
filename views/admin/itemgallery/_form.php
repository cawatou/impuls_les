<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

if(isset($item_model)){
    // Получаем список категорий товара
    foreach($item_model as $item){
        $options[$item->id] = $item->name;
    }
}
?>

<div class="item-gallery-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_id')->dropDownList($options)->label('Товар');?>

    <?if($model->img != 'none'):?>
        <img height="200" src="<?=$model->img;?>">
    <?else:?>
        <i class="fa fa-picture-o fa-6" aria-hidden="true"></i>
    <?endif;?>

    <?=$form->field($file_model, 'imageFile')->fileInput()->label('[изменить]');?><br>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
