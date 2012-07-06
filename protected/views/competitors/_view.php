<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPETITOR_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->COMPETITOR_ID), array('view', 'id'=>$data->COMPETITOR_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FIRST_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->FIRST_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LAST_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->LAST_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPETITOR_LEVEL')); ?>:</b>
	<?php echo CHtml::encode($data->COMPETITOR_LEVEL); ?>
	<br />
	<?php /*

	<b><?php echo CHtml::encode($data->getAttributeLabel('REMOVED')); ?>:</b>
	<?php echo CHtml::encode($data->REMOVED); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ADDRESS')); ?>:</b>
	<?php echo CHtml::encode($data->ADDRESS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CITY')); ?>:</b>
	<?php echo CHtml::encode($data->CITY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATE')); ?>:</b>
	<?php echo CHtml::encode($data->STATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('POSTCODE')); ?>:</b>
	<?php echo CHtml::encode($data->POSTCODE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COUNTRY')); ?>:</b>
	<?php echo CHtml::encode($data->COUNTRY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PHONE')); ?>:</b>
	<?php echo CHtml::encode($data->PHONE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MOBILE')); ?>:</b>
	<?php echo CHtml::encode($data->MOBILE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EMAIL')); ?>:</b>
	<?php echo CHtml::encode($data->EMAIL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LEADER')); ?>:</b>
	<?php echo CHtml::encode($data->LEADER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REGISTERED')); ?>:</b>
	<?php echo CHtml::encode($data->REGISTERED); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIB_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->BIB_STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIB_NUMBER')); ?>:</b>
	<?php echo CHtml::encode($data->BIB_NUMBER); ?>
	<br />

	*/ ?>

</div>