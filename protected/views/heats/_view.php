<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('HEAT_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->HEAT_ID), array('view', 'id'=>$data->HEAT_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPETITION_ID')); ?>:</b>
	<?php echo CHtml::encode($data->COMPETITION_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EVENT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EVENT_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HEAT_NO')); ?>:</b>
	<?php echo CHtml::encode($data->HEAT_NO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSTHROUGH')); ?>:</b>
	<?php echo CHtml::encode($data->PASSTHROUGH); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ROUND_ID')); ?>:</b>
	<?php echo CHtml::encode($data->ROUND_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FINAL')); ?>:</b>
	<?php echo CHtml::encode($data->FINAL); ?>
	<br />


</div>