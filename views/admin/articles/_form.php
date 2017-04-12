<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]); ?>
    
    <label class="control-label" for="page-img">Изображение</label><br>
    <?if($model->img == 'none' || $model->img == ''):?>
	<img height="200" src="/upload/noimage.png">
    <?else:?>
	<img height="200" src="<?=$model->img;?>">
    <?endif;?>
    <?=$form->field($file_model, 'imageFile')->fileInput()->label('[изменить]');?><br>
    
    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>