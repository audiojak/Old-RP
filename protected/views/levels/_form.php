<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'levels-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'LEVEL_NAME'); ?>
		<?php echo $form->textField($model,'LEVEL_NAME',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'LEVEL_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RANK'); ?>
		<?php echo $form->textField($model,'RANK'); ?>
		<?php echo $form->error($model,'RANK'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->