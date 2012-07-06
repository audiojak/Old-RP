<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rounds-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ROUND_NO'); ?>
		<?php echo $form->textField($model,'ROUND_NO'); ?>
		<?php echo $form->error($model,'ROUND_NO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PASSTHROUGH'); ?>
		<?php echo $form->textField($model,'PASSTHROUGH'); ?>
		<?php echo $form->error($model,'PASSTHROUGH'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'JUDGE_COUPLES'); ?>
		<?php echo $form->textField($model,'JUDGE_COUPLES'); ?>
		<?php echo $form->error($model,'JUDGE_COUPLES'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EVENT_ID'); ?>
		<?php echo $form->textField($model,'EVENT_ID'); ?>
		<?php echo $form->error($model,'EVENT_ID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->