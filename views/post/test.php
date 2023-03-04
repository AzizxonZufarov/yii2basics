<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
?>

<h1>post</h1>
<?php
//debug(Yii::$app);
//debug($model);?>
    ﻿

<?php if( Yii::$app->session->hasFlash('success') ): ?>
    <div
            class="alert alert-success alert-dismissible"
            role="alert"> <button type="button" class="close"
             data-dismiss="alert"
            aria-label="Close"><span
             aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php if( Yii::$app->session->hasFlash ('error') ): ?>
    <div class="alert alert-danger alert-dismissible"
         role="alert"> <button type="button"
         class="close" data-dismiss="alert" aria-label="Close"><span
         aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>

<? $form = ActiveForm::begin(['options'=>['id'=> 'test']]);?>
    <?= $form->field($model, 'name')->label('Name');?>
<?= $form->field($model, 'email')->input('email');?>
<?= yii\jui\DatePicker::widget(['name' => 'attributeName']) ?>
    <?= $form->field($model, 'text')->label('Текст')->textarea(['rows'=>10]);?>

<?=


 $form->field($model, 'text')->widget(Widget::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'plugins' => [
            'clips',
            'fullscreen',
        ],
        'clips' => [
            ['Lorem ipsum...', 'Lorem...'],
            ['red', '<span class="label-red">red</span>'],
            ['green', '<span class="label-green">green</span>'],
            ['blue', '<span class="label-blue">blue</span>'],
        ],
    ],
]);

?>
  <?=   Html::submitButton('Отправить', ['class' => 'btn btn-success']);?>
<?    ActiveForm::end();?>