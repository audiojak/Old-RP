<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROUND_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ROUND_ID), array('view', 'id'=>$data->ROUND_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROUND_NO')); ?>:</b>
	<?php echo CHtml::encode($data->ROUND_NO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSTHROUGH')); ?>:</b>
	<?php echo CHtml::encode($data->PASSTHROUGH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JUDGE_COUPLES')); ?>:</b>
	<?php echo CHtml::encode($data->JUDGE_COUPLES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EVENT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EVENT_ID); ?>
	<br />


</div>