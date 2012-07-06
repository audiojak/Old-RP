<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'EVENT_ID'); ?>
		<?php echo $form->textField($model,'EVENT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMPETITION_ID'); ?>
		<?php echo $form->textField($model,'COMPETITION_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EVENT_NAME'); ?>
		<?php echo $form->textField($model,'EVENT_NAME',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REMOVED'); ?>
		<?php echo $form->textField($model,'REMOVED'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMP_PER_HEAT'); ?>
		<?php echo $form->textField($model,'COMP_PER_HEAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SONGS_PER_HEAT'); ?>
		<?php echo $form->textField($model,'SONGS_PER_HEAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MINS_PER_HEAT'); ?>
		<?php echo $form->textField($model,'MINS_PER_HEAT'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FINAL_COMPETITORS'); ?>
		<?php echo $form->textField($model,'FINAL_COMPETITORS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PROCEED_COMPETITORS'); ?>
		<?php echo $form->textField($model,'PROCEED_COMPETITORS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FINAL_SONGS'); ?>
		<?php echo $form->textField($model,'FINAL_SONGS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FINAL_MINUTES'); ?>
		<?php echo $form->textField($model,'FINAL_MINUTES'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUMBER_REPERCHARGE'); ?>
		<?php echo $form->textField($model,'NUMBER_REPERCHARGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TOTAL_REPERCHARGE'); ?>
		<?php echo $form->textField($model,'TOTAL_REPERCHARGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ALLOW_REPERCHARGE'); ?>
		<?php echo $form->textField($model,'ALLOW_REPERCHARGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EVENT_LEVEL'); ?>
		<?php echo $form->textField($model,'EVENT_LEVEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUMBER_ROUNDS'); ?>
		<?php echo $form->textField($model,'NUMBER_ROUNDS'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'YESES'); ?>
		<?php echo $form->textField($model,'YESES'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOES'); ?>
		<?php echo $form->textField($model,'NOES'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TYPE'); ?>
		<?php echo $form->textField($model,'TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ALT'); ?>
		<?php echo $form->textField($model,'ALT'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->