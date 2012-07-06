<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('LEVEL_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->LEVEL_ID), array('view', 'id'=>$data->LEVEL_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LEVEL_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->LEVEL_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RANK')); ?>:</b>
	<?php echo CHtml::encode($data->RANK); ?>
	<br />


</div>