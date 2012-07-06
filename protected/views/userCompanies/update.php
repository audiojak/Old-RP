<?php
$this->breadcrumbs=array(
	'User Companies'=>array('index'),
	$model->USER_COMPANY_ID=>array('view','id'=>$model->USER_COMPANY_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserCompanies', 'url'=>array('index')),
	array('label'=>'Create UserCompanies', 'url'=>array('create')),
	array('label'=>'View UserCompanies', 'url'=>array('view', 'id'=>$model->USER_COMPANY_ID)),
	array('label'=>'Manage UserCompanies', 'url'=>array('admin')),
);
?>

<h1>Update UserCompanies <?php echo $model->USER_COMPANY_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>