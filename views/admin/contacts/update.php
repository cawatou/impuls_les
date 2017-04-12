<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contacts */

$this->title = 'Контакты: ';
$this->params['breadcrumbs'][] = ['label' => 'Контакты', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="contacts-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
