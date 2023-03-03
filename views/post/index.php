<h1>index</h1>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>



<? $form = ActiveForm::begin(['options'=>['id'=> 'test']]);?>
<?= $form->field($model, 'name')->label('Name');?>
<?= $form->field($model, 'email')->input('email');?>
<?= $form->field($model, 'text')->label('Текст')->textarea(['rows'=>10]);?>
<?=   Html::submitButton('Отправить', ['class' => 'btn btn-success']);?>
<?    ActiveForm::end();?>