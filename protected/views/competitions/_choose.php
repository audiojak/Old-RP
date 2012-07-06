<div class="view">
	<?php echo ($data->COMPETITION_ID == $comp) ? '<h1>' : '' ; ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('COMPETITION_ID')); ?>:</b>
	<?php echo CHtml::link($data->COMPETITION_NAME, array('competitions/choose','a' => $data->COMPETITION_ID)); ?>
	<br />
	<?php echo ($data->COMPETITION_ID == $comp) ? '</h1>' : '' ; ?>
</div>