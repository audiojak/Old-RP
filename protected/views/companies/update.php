<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->COMPANY_ID=>array('view','id'=>$model->COMPANY_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Companies', 'url'=>array('index')),
	array('label'=>'Create Companies', 'url'=>array('create')),
	array('label'=>'View Companies', 'url'=>array('view', 'id'=>$model->COMPANY_ID)),
	array('label'=>'Manage Companies', 'url'=>array('admin')),
);
?>

<h1>Update Companies <?php echo $model->COMPANY_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>