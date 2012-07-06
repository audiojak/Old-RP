<?php
$this->breadcrumbs=array(
	'Levels'=>array('index'),
	$model->LEVEL_ID,
);

$this->menu=array(
	array('label'=>'List Levels', 'url'=>array('index')),
	array('label'=>'Create Levels', 'url'=>array('create')),
	array('label'=>'Update Levels', 'url'=>array('update', 'id'=>$model->LEVEL_ID)),
	array('label'=>'Delete Levels', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->LEVEL_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Levels', 'url'=>array('admin')),
);
?>

<h1>View Levels #<?php echo $model->LEVEL_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'LEVEL_ID',
		'LEVEL_NAME',
		'RANK',
	),
)); ?>
