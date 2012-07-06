<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_COMPANY_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->USER_COMPANY_ID), array('view', 'id'=>$data->USER_COMPANY_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->USER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPANY_ID')); ?>:</b>
	<?php echo CHtml::encode($data->COMPANY_ID); ?>
	<br />


</div>