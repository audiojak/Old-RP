<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'COMPETITOR_ID'); ?>
		<?php echo $form->textField($model,'COMPETITOR_ID'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'WSDC_NO'); ?>
		<?php echo $form->textField($model,'WSDC_NO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FIRST_NAME'); ?>
		<?php echo $form->textField($model,'FIRST_NAME',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LAST_NAME'); ?>
		<?php echo $form->textField($model,'LAST_NAME',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMPETITOR_LEVEL'); ?>
		<?php echo $form->textField($model,'COMPETITOR_LEVEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REMOVED'); ?>
		<?php echo $form->textField($model,'REMOVED'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ADDRESS'); ?>
		<?php echo $form->textArea($model,'ADDRESS',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CITY'); ?>
		<?php echo $form->textField($model,'CITY',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATE'); ?>
		<?php echo $form->textField($model,'STATE',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'POSTCODE'); ?>
		<?php echo $form->textField($model,'POSTCODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COUNTRY'); ?>
		<?php echo $form->textField($model,'COUNTRY',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PHONE'); ?>
		<?php echo $form->textField($model,'PHONE',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MOBILE'); ?>
		<?php echo $form->textField($model,'MOBILE',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EMAIL'); ?>
		<?php echo $form->textField($model,'EMAIL',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LEADER'); ?>
		<?php echo $form->textField($model,'LEADER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REGISTERED'); ?>
		<?php echo $form->textField($model,'REGISTERED'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIB_STATUS'); ?>
		<?php echo $form->textField($model,'BIB_STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIB_NUMBER'); ?>
		<?php echo $form->textField($model,'BIB_NUMBER'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->