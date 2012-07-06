<?php
$this->breadcrumbs=array(
	'Levels'=>array('index'),
	$model->LEVEL_ID=>array('view','id'=>$model->LEVEL_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Levels', 'url'=>array('index')),
	array('label'=>'Create Levels', 'url'=>array('create')),
	array('label'=>'View Levels', 'url'=>array('view', 'id'=>$model->LEVEL_ID)),
	array('label'=>'Manage Levels', 'url'=>array('admin')),
);
?>

<h1>Update Levels <?php echo $model->LEVEL_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>