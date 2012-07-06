<?php
$this->breadcrumbs=array(
	'Judges'=>array('index'),
	$model->JUDGE_ID,
);

$this->menu=array(
	array('label'=>'List Judges', 'url'=>array('index')),
	array('label'=>'Create Judges', 'url'=>array('create')),
	array('label'=>'Update Judges', 'url'=>array('update', 'id'=>$model->JUDGE_ID)),
	array('label'=>'Delete Judges', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->JUDGE_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Judges', 'url'=>array('admin')),
);
?>

<h1>View Judges #<?php echo $model->JUDGE_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'JUDGE_ID',
		'FIRST_NAME',
		'SECOND_NAME',
	),
)); ?>
