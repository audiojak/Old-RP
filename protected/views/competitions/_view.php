<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPETITION_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->COMPETITION_ID), array('view', 'id'=>$data->COMPETITION_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPANY_ID')); ?>:</b>
	<?php echo CHtml::encode($data->COMPANY_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPETITION_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->COMPETITION_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DATE')); ?>:</b>
	<?php echo CHtml::encode($data->DATE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STAGE')); ?>:</b>
	<?php echo CHtml::encode($data->STAGE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REMOVED')); ?>:</b>
	<?php echo CHtml::encode($data->REMOVED); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('JUDGE_ROUND')); ?>:</b>
	<?php echo CHtml::encode($data->JUDGE_ROUND); ?>
	<br />


</div>