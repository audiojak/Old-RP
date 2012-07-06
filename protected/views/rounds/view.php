<?php
$this->breadcrumbs=array(
	'Rounds'=>array('index'),
	$model->ROUND_ID,
);

$this->menu=array(
	array('label'=>'List Rounds', 'url'=>array('index')),
	array('label'=>'Create Rounds', 'url'=>array('create')),
	array('label'=>'Update Rounds', 'url'=>array('update', 'id'=>$model->ROUND_ID)),
	array('label'=>'Delete Rounds', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ROUND_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rounds', 'url'=>array('admin')),
);
?>

<h1>View Rounds #<?php echo $model->ROUND_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ROUND_ID',
		'ROUND_NO',
		'PASSTHROUGH',
		'JUDGE_COUPLES',
		'EVENT_ID',
	),
)); ?>
