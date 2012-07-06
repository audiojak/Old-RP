<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'LEVEL_ID'); ?>
		<?php echo $form->textField($model,'LEVEL_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LEVEL_NAME'); ?>
		<?php echo $form->textField($model,'LEVEL_NAME',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RANK'); ?>
		<?php echo $form->textField($model,'RANK'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->