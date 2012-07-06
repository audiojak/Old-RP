<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'events-form',
	'enableAjaxValidation'=>false,
	'focus'=>array($model,'EVENT_NAME')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'COMPETITION_ID'); ?>
		<?php echo $form->dropDownList($model, 'COMPETITION_ID', CHtml::listData(Competitions::model()->findAll(), 'COMPETITION_ID', 'COMPETITION_NAME'),array('prompt' => 'Select A Competition')); ?>
		<?php echo $form->error($model,'COMPETITION_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EVENT_NAME'); ?>
		<?php echo $form->textField($model,'EVENT_NAME',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'EVENT_NAME'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'EVENT_LEVEL'); ?>
		<?php echo $form->dropDownList($model, 'EVENT_LEVEL', CHtml::listData(Levels::model()->findAll(), 'LEVEL_ID', 'LEVEL_NAME'),array('prompt' => 'Select A Level')); ?>
		<?php echo $form->error($model,'EVENT_LEVEL'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'TYPE'); ?>
		<?php echo $form->dropDownList($model,'TYPE',array(1 => 'Leaders', 2 => 'Followers', 3 => 'Couples'),array('prompt' => 'Select A Type', 'required' => true)); ?>
		<?php echo $form->error($model,'TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REMOVED',array('required' => true,'label' => 'Inactive')); ?>
		<?php echo $form->checkBox($model,'REMOVED'); ?>
		<?php echo $form->error($model,'REMOVED'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMP_PER_HEAT',array('label' => 'Competitors per heat')); ?>
		<?php echo $form->textField($model,'COMP_PER_HEAT'); ?>
		<?php echo $form->error($model,'COMP_PER_HEAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SONGS_PER_HEAT',array('label' => 'Songs per heat')); ?>
		<?php echo $form->textField($model,'SONGS_PER_HEAT'); ?>
		<?php echo $form->error($model,'SONGS_PER_HEAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MINS_PER_HEAT',array('label' => 'Minutes per heat')); ?>
		<?php echo $form->textField($model,'MINS_PER_HEAT'); ?>
		<?php echo $form->error($model,'MINS_PER_HEAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FINAL_COMPETITORS',array('label' => 'Number of competitors to be in the final')); ?>
		<?php echo $form->textField($model,'FINAL_COMPETITORS'); ?>
		<?php echo $form->error($model,'FINAL_COMPETITORS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PROCEED_COMPETITORS',array('label' => 'Number of competitors through each heat')); ?>
		<?php echo $form->textField($model,'PROCEED_COMPETITORS'); ?>
		<?php echo $form->error($model,'PROCEED_COMPETITORS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FINAL_SONGS',array('label' => 'Number of songs in the final')); ?>
		<?php echo $form->textField($model,'FINAL_SONGS'); ?>
		<?php echo $form->error($model,'FINAL_SONGS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FINAL_MINUTES',array('label' => 'Number of minutes in the final')); ?>
		<?php echo $form->textField($model,'FINAL_MINUTES'); ?>
		<?php echo $form->error($model,'FINAL_MINUTES'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUMBER_REPERCHARGE',array('label' => 'Number of competitors per repercharge')); ?>
		<?php echo $form->textField($model,'NUMBER_REPERCHARGE'); ?>
		<?php echo $form->error($model,'NUMBER_REPERCHARGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TOTAL_REPERCHARGE',array('label' => 'Number of competitors in each repercharge')); ?>
		<?php echo $form->textField($model,'TOTAL_REPERCHARGE'); ?>
		<?php echo $form->error($model,'TOTAL_REPERCHARGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ALLOW_REPERCHARGE'); ?>
		<?php echo $form->checkBox($model,'ALLOW_REPERCHARGE'); ?>
		<?php echo $form->error($model,'ALLOW_REPERCHARGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUMBER_ROUNDS',array('label' => 'Number of rounds')); ?>
		<?php echo $form->textField($model,'NUMBER_ROUNDS'); ?>
		<?php echo $form->error($model,'NUMBER_ROUNDS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'YESES',array('label' => 'Number of yeses')); ?>
		<?php echo $form->textField($model,'YESES'); ?>
		<?php echo $form->error($model,'YESES'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOES',array('label' => 'Number of noes')); ?>
		<?php echo $form->textField($model,'NOES'); ?>
		<?php echo $form->error($model,'NOES'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'ALT'); ?>
		<?php echo $form->textField($model,'ALT'); ?>
		<?php echo $form->error($model,'ALT'); ?>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->