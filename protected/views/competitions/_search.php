<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'COMPETITION_ID'); ?>
		<?php echo $form->textField($model,'COMPETITION_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMPANY_ID'); ?>
		<?php echo $form->textField($model,'COMPANY_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMPETITION_NAME'); ?>
		<?php echo $form->textField($model,'COMPETITION_NAME',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DATE'); ?>
		<?php echo $form->textField($model,'DATE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STAGE'); ?>
		<?php echo $form->textField($model,'STAGE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REMOVED'); ?>
		<?php echo $form->textField($model,'REMOVED'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'JUDGE_ROUND'); ?>
		<?php echo $form->textField($model,'JUDGE_ROUND'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->