<?php
$this->breadcrumbs=array(
	'Partnerships'=>array('index'),
	$model->pid,
);

$this->menu=array(
	array('label'=>'List Partnership', 'url'=>array('index')),
	array('label'=>'Create Partnership', 'url'=>array('create')),
	array('label'=>'Update Partnership', 'url'=>array('update', 'id'=>$model->pid)),
	array('label'=>'Delete Partnership', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Partnership', 'url'=>array('admin')),
);
?>

<h1>View Partnership #<?php echo $model->pid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pid',
		'leader_id',
		'follower_id',
		'event_id',
	),
)); ?>
