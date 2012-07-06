<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('JUDGE_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->JUDGE_ID), array('view', 'id'=>$data->JUDGE_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FIRST_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->FIRST_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SECOND_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->SECOND_NAME); ?>
	<br />


</div>