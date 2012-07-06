<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'competitors-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'FIRST_NAME')
));

?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'FIRST_NAME'); ?>
		<?php echo $form->textField($model,'FIRST_NAME',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'FIRST_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LAST_NAME'); ?>
		<?php echo $form->textField($model,'LAST_NAME',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'LAST_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BIB_NUMBER'); ?>
		<?php echo $form->textField($model,'BIB_NUMBER'); ?>
		<?php echo $form->error($model,'BIB_NUMBER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COMPETITOR_LEVEL'); ?>
		<?php echo $form->dropDownList($model, 'COMPETITOR_LEVEL', CHtml::listData(Levels::model()->findAll(), 'LEVEL_ID', 'LEVEL_NAME'),array('prompt' => 'Select A Level')); ?>
		<?php echo $form->error($model,'COMPETITOR_LEVEL'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'LEADER'); ?>
		<?php echo $form->dropDownList($model, 'LEADER', array( 1 => 'Leader', 0 =>'Follower')); ?>
		<?php echo $form->error($model,'LEADER'); ?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'WSDC_NO'); ?>
		<?php echo $form->textField($model,'WSDC_NO'); ?>
		<?php echo $form->error($model,'WSDC_NO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REMOVED',array('required' => true,'label' => 'Inactive')); ?>
		<?php echo $form->checkBox($model,'REMOVED'); ?>
		<?php echo $form->error($model,'REMOVED'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REGISTERED'); ?>
		<?php echo $form->dropDownList($model, 'REGISTERED', array(1 =>'Yes', 0 => 'No', )); ?>
		<?php echo $form->error($model,'REGISTERED'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BIB_STATUS'); ?>
		<?php echo $form->dropDownList($model, 'BIB_STATUS', array( 0 => 'Not Issued', 1 =>'Issued', 2 =>'Returned')); ?>
		<?php echo $form->error($model,'BIB_STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ADDRESS'); ?>
		<?php echo $form->textArea($model,'ADDRESS',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ADDRESS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CITY'); ?>
		<?php echo $form->textField($model,'CITY',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'CITY'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'STATE'); ?>
		<?php echo $form->textField($model,'STATE',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'STATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'POSTCODE'); ?>
		<?php echo $form->textField($model,'POSTCODE'); ?>
		<?php echo $form->error($model,'POSTCODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COUNTRY'); ?>
		<?php echo $form->textField($model,'COUNTRY',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'COUNTRY'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PHONE'); ?>
		<?php echo $form->textField($model,'PHONE',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'PHONE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MOBILE'); ?>
		<?php echo $form->textField($model,'MOBILE',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'MOBILE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'EMAIL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->