<?php
$this->breadcrumbs=array(
	'Heats'=>array('index'),
	$model->HEAT_ID,
);

$this->menu=array(
	array('label'=>'List Heats', 'url'=>array('index')),
	array('label'=>'Create Heats', 'url'=>array('create')),
	array('label'=>'Update Heats', 'url'=>array('update', 'id'=>$model->HEAT_ID)),
	array('label'=>'Delete Heats', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->HEAT_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Heats', 'url'=>array('admin')),
);
?>

<h1>View Heats #<?php echo $model->HEAT_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'HEAT_ID',
		'COMPETITION_ID',
		'EVENT_ID',
		'HEAT_NO',
		'PASSTHROUGH',
		'ROUND_ID',
		'FINAL',
	),
)); ?>
