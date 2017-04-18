<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $form yii\widgets\ActiveForm */
?>
<?if(isset($cat_model)){
    // Получаем список категорий товара
    foreach($cat_model as $cat){
	$options[$cat->id] = $cat->name;
    }
}?>
<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>

   

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat_id')->dropDownList($options);?>

    <?if($model->img != 'none'):?>
	<img height="200" src="<?=$model->img;?>">
    <?else:?>
	<i class="fa fa-picture-o fa-6" aria-hidden="true"></i>
    <?endif;?>
    <?=$form->field($file_model, 'imageFile')->fileInput()->label('[изменить]');?><br>   
   
    <?= $form->field($model, 'manufacturer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wood')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'width')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thickness')->textInput(['maxlength' => true]) ?>



    <div class="form-group field-item-thickness required">
        <label class="control-label"><?="Цена - ".$grade_model[0]->title?></label>
        <input type="text" class="form-control" name="price[<?=$grade_model[0]->id?>]" value="<?=(isset($price_model[0])) ? $price_model[0]->price : '' ;?>">
        <div class="help-block"></div>
    </div>

    <div class="form-group field-item-thickness required">
        <label class="control-label"><?="Цена - ".$grade_model[1]->title?></label>
        <input type="text" class="form-control" name="price[<?=$grade_model[1]->id?>]" value="<?=(isset($price_model[1])) ? $price_model[1]->price : '' ;?>">
        <div class="help-block"></div>
    </div>

    <div class="form-group field-item-thickness required">
        <label class="control-label"><?="Цена - ".$grade_model[2]->title?></label>
        <input type="text" class="form-control" name="price[<?=$grade_model[2]->id?>]" value="<?=(isset($price_model[2])) ? $price_model[2]->price : '' ;?>">
        <div class="help-block"></div>
    </div>

    <div class="form-group field-item-thickness required">
        <label class="control-label"><?="Цена - ".$grade_model[3]->title?></label>
        <input type="text" class="form-control" name="price[<?=$grade_model[3]->id?>]" value="<?=(isset($price_model[3])) ? $price_model[3]->price : '' ;?>">
        <div class="help-block"></div>
    </div>

    <div class="form-group field-item-thickness required">
        <label class="control-label"><?="Цена - ".$grade_model[4]->title?></label>
        <input type="text" class="form-control" name="price[<?=$grade_model[4]->id?>]" value="<?=(isset($price_model[4])) ? $price_model[4]->price : '' ;?>">
        <div class="help-block"></div>
    </div>

    <div class="form-group field-item-thickness required">
        <label class="control-label"><?="Цена - ".$grade_model[5]->title?></label>
        <input type="text" class="form-control" name="price[<?=$grade_model[5]->id?>]" value="<?=(isset($price_model[5])) ? $price_model[5]->price : '' ;?>">
        <div class="help-block"></div>
    </div>


    <?= $form->field($model, 'title')->textInput(['maxlength' => true]); ?>
      
    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
