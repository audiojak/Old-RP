<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->COMPANY_ID,
);

$this->menu=array(
	array('label'=>'List Companies', 'url'=>array('index')),
	array('label'=>'Create Companies', 'url'=>array('create')),
	array('label'=>'Update Companies', 'url'=>array('update', 'id'=>$model->COMPANY_ID)),
	array('label'=>'Delete Companies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->COMPANY_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Companies', 'url'=>array('admin')),
);
?>

<h1>View Companies #<?php echo $model->COMPANY_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'COMPANY_ID',
		'COMPANY_NAME',
		'REMOVED',
	),
)); ?>
