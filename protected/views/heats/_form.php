<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'heats-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'COMPETITION_ID'); ?>
		<?php echo $form->textField($model,'COMPETITION_ID'); ?>
		<?php echo $form->error($model,'COMPETITION_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EVENT_ID'); ?>
		<?php echo $form->textField($model,'EVENT_ID'); ?>
		<?php echo $form->error($model,'EVENT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HEAT_NO'); ?>
		<?php echo $form->textField($model,'HEAT_NO'); ?>
		<?php echo $form->error($model,'HEAT_NO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PASSTHROUGH'); ?>
		<?php echo $form->textField($model,'PASSTHROUGH'); ?>
		<?php echo $form->error($model,'PASSTHROUGH'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ROUND_ID'); ?>
		<?php echo $form->textField($model,'ROUND_ID'); ?>
		<?php echo $form->error($model,'ROUND_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FINAL'); ?>
		<?php echo $form->textField($model,'FINAL'); ?>
		<?php echo $form->error($model,'FINAL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->