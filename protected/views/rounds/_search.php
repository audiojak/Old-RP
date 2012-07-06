<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ROUND_ID'); ?>
		<?php echo $form->textField($model,'ROUND_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ROUND_NO'); ?>
		<?php echo $form->textField($model,'ROUND_NO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PASSTHROUGH'); ?>
		<?php echo $form->textField($model,'PASSTHROUGH'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JUDGE_COUPLES'); ?>
		<?php echo $form->textField($model,'JUDGE_COUPLES'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EVENT_ID'); ?>
		<?php echo $form->textField($model,'EVENT_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->