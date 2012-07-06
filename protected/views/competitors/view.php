<?php
$this->breadcrumbs=array(
	'Competitors'=>array('index'),
	$model->COMPETITOR_ID,
);

$this->menu=array(
	array('label'=>'List Competitors', 'url'=>array('index')),
	array('label'=>'Create Competitors', 'url'=>array('create')),
	array('label'=>'Update Competitors', 'url'=>array('update', 'id'=>$model->COMPETITOR_ID)),
	array('label'=>'Delete Competitors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->COMPETITOR_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Competitors', 'url'=>array('admin')),
);
?>

<h1>View Competitors #<?php echo $model->COMPETITOR_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'COMPETITOR_ID',
		'WSDC_NO',
		'FIRST_NAME',
		'LAST_NAME',
		'COMPETITOR_LEVEL',
		'REMOVED',
		'ADDRESS',
		'CITY',
		'STATE',
		'POSTCODE',
		'COUNTRY',
		'PHONE',
		'MOBILE',
		'EMAIL',
		'LEADER',
		'REGISTERED',
		'BIB_STATUS',
		'BIB_NUMBER',
	),
)); ?>
