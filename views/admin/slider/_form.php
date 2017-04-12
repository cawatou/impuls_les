<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]); ?>
    <?if($model->img):?>
	<img height="200" src="<?=$model->img;?>">
    <?else:?>
	<i class="fa fa-picture-o fa-6" arimgia-hidden="true"></i>
    <?endif;?>
    <?=$form->field($file_model, 'imageFile')->fileInput()->label('[изменить]');?><br>   
   
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
