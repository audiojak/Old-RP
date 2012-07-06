<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPANY_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->COMPANY_ID), array('view', 'id'=>$data->COMPANY_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPANY_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->COMPANY_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REMOVED')); ?>:</b>
	<?php echo CHtml::encode($data->REMOVED); ?>
	<br />


</div>