<?php
$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	$model->COMPETITION_ID,
);

$this->menu=array(
	array('label'=>'List Competitions', 'url'=>array('index')),
	array('label'=>'Create Competitions', 'url'=>array('create')),
	array('label'=>'Update Competitions', 'url'=>array('update', 'id'=>$model->COMPETITION_ID)),
	array('label'=>'Delete Competitions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->COMPETITION_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Competitions', 'url'=>array('admin')),
);
?>

<h1>View Competitions #<?php echo $model->COMPETITION_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'COMPETITION_ID',
		'COMPANY_ID',
		'COMPETITION_NAME',
		'DATE',
		'STAGE',
		'REMOVED',
		'JUDGE_ROUND',
	),
)); ?>
