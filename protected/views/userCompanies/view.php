<?php
$this->breadcrumbs=array(
	'User Companies'=>array('index'),
	$model->USER_COMPANY_ID,
);

$this->menu=array(
	array('label'=>'List UserCompanies', 'url'=>array('index')),
	array('label'=>'Create UserCompanies', 'url'=>array('create')),
	array('label'=>'Update UserCompanies', 'url'=>array('update', 'id'=>$model->USER_COMPANY_ID)),
	array('label'=>'Delete UserCompanies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->USER_COMPANY_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserCompanies', 'url'=>array('admin')),
);
?>

<h1>View UserCompanies #<?php echo $model->USER_COMPANY_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'USER_COMPANY_ID',
		'USER_ID',
		'COMPANY_ID',
	),
)); ?>
