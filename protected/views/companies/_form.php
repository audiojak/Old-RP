<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'companies-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'COMPANY_NAME'); ?>
		<?php echo $form->textField($model,'COMPANY_NAME',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'COMPANY_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REMOVED'); ?>
		<?php echo $form->textField($model,'REMOVED'); ?>
		<?php echo $form->error($model,'REMOVED'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->