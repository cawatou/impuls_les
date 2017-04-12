<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>
<?if(isset($model_cat)){
    // Получаем список категорий товара
    foreach($model_cat as $cat){
	$options[$cat->id] = $cat->title;
    }
}?>
<div class="gallery-form">

    <?php $form = ActiveForm::begin(['id' => 'gallery_aform']); ?>

    <?= $form->field($model, 'cat_id')->dropDownList($options);?>

    <?if($model->src):?>
	<img height="200" src="<?=$model->src;?>">
    <?else:?>
	<i class="fa fa-picture-o fa-6" aria-hidden="true"></i>
    <?endif;?>
    <?=$form->field($file_model, 'imageFile')->fileInput()->label('[изменить]');?><br>   
   
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
