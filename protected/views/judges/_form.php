<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'judges-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'FIRST_NAME'); ?>
		<?php echo $form->textField($model,'FIRST_NAME',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'FIRST_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SECOND_NAME'); ?>
		<?php echo $form->textField($model,'SECOND_NAME',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'SECOND_NAME'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->