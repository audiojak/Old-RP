<?php
$this->breadcrumbs=array(
	'Heats'=>array('index'),
	$model->HEAT_ID=>array('view','id'=>$model->HEAT_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Heats', 'url'=>array('index')),
	array('label'=>'Create Heats', 'url'=>array('create')),
	array('label'=>'View Heats', 'url'=>array('view', 'id'=>$model->HEAT_ID)),
	array('label'=>'Manage Heats', 'url'=>array('admin')),
);
?>

<h1>Update Heats <?php echo $model->HEAT_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>