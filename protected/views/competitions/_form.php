<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competitions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'COMPANY_ID'); ?>
		<?php echo $form->textField($model,'COMPANY_ID'); ?>
		<?php echo $form->error($model,'COMPANY_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COMPETITION_NAME'); ?>
		<?php echo $form->textField($model,'COMPETITION_NAME',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'COMPETITION_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DATE'); ?>
		<?php echo $form->textField($model,'DATE'); ?>
		<?php echo $form->error($model,'DATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STAGE'); ?>
		<?php echo $form->textField($model,'STAGE'); ?>
		<?php echo $form->error($model,'STAGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REMOVED'); ?>
		<?php echo $form->textField($model,'REMOVED'); ?>
		<?php echo $form->error($model,'REMOVED'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JUDGE_ROUND'); ?>
		<?php echo $form->textField($model,'JUDGE_ROUND'); ?>
		<?php echo $form->error($model,'JUDGE_ROUND'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->