<div class="view" onclick="location.href='/events/<?php echo CHtml::encode($data->EVENT_ID)?>';" style="cursor: pointer;">

	<b><?php echo CHtml::encode($data->getAttributeLabel('EVENT_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->EVENT_ID), array('view', 'id'=>$data->EVENT_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPETITION_ID')); ?>:</b>
	<?php echo CHtml::encode($data->COMPETITION_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EVENT_NAME')); ?>:</b>
	<h3><?php echo CHtml::encode($data->EVENT_NAME); ?></h3>
	<br />
	
	<?php /*

	<b><?php echo CHtml::encode($data->getAttributeLabel('REMOVED')); ?>:</b>
	<?php echo CHtml::encode($data->REMOVED); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMP_PER_HEAT')); ?>:</b>
	<?php echo CHtml::encode($data->COMP_PER_HEAT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SONGS_PER_HEAT')); ?>:</b>
	<?php echo CHtml::encode($data->SONGS_PER_HEAT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MINS_PER_HEAT')); ?>:</b>
	<?php echo CHtml::encode($data->MINS_PER_HEAT); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('FINAL_COMPETITORS')); ?>:</b>
	<?php echo CHtml::encode($data->FINAL_COMPETITORS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PROCEED_COMPETITORS')); ?>:</b>
	<?php echo CHtml::encode($data->PROCEED_COMPETITORS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FINAL_SONGS')); ?>:</b>
	<?php echo CHtml::encode($data->FINAL_SONGS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FINAL_MINUTES')); ?>:</b>
	<?php echo CHtml::encode($data->FINAL_MINUTES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUMBER_REPERCHARGE')); ?>:</b>
	<?php echo CHtml::encode($data->NUMBER_REPERCHARGE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TOTAL_REPERCHARGE')); ?>:</b>
	<?php echo CHtml::encode($data->TOTAL_REPERCHARGE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALLOW_REPERCHARGE')); ?>:</b>
	<?php echo CHtml::encode($data->ALLOW_REPERCHARGE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EVENT_LEVEL')); ?>:</b>
	<?php echo CHtml::encode($data->EVENT_LEVEL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUMBER_ROUNDS')); ?>:</b>
	<?php echo CHtml::encode($data->NUMBER_ROUNDS); ?>
	<br />
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('YESES')); ?>:</b>
	<?php echo CHtml::encode($data->YESES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOES')); ?>:</b>
	<?php echo CHtml::encode($data->NOES); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ALT')); ?>:</b>
	<?php echo CHtml::encode($data->ALT); ?>
	<br />

	*/ ?>

</div>