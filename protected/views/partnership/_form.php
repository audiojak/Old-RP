<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'partnership-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'leader_id'); ?>
		<?php echo $form->textField($model,'leader_id'); ?>
		<?php echo $form->error($model,'leader_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'follower_id'); ?>
		<?php echo $form->textField($model,'follower_id'); ?>
		<?php echo $form->error($model,'follower_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_id'); ?>
		<?php echo $form->textField($model,'event_id'); ?>
		<?php echo $form->error($model,'event_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->