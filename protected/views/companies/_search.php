<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'COMPANY_ID'); ?>
		<?php echo $form->textField($model,'COMPANY_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMPANY_NAME'); ?>
		<?php echo $form->textField($model,'COMPANY_NAME',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REMOVED'); ?>
		<?php echo $form->textField($model,'REMOVED'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->