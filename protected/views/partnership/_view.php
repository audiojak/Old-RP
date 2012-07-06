<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pid), array('view', 'id'=>$data->pid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leader_id')); ?>:</b>
	<?php echo CHtml::encode($data->leader_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('follower_id')); ?>:</b>
	<?php echo CHtml::encode($data->follower_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_id')); ?>:</b>
	<?php echo CHtml::encode($data->event_id); ?>
	<br />


</div>