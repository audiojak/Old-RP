<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'HEAT_ID'); ?>
		<?php echo $form->textField($model,'HEAT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMPETITION_ID'); ?>
		<?php echo $form->textField($model,'COMPETITION_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EVENT_ID'); ?>
		<?php echo $form->textField($model,'EVENT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HEAT_NO'); ?>
		<?php echo $form->textField($model,'HEAT_NO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PASSTHROUGH'); ?>
		<?php echo $form->textField($model,'PASSTHROUGH'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ROUND_ID'); ?>
		<?php echo $form->textField($model,'ROUND_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FINAL'); ?>
		<?php echo $form->textField($model,'FINAL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->