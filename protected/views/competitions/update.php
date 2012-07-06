<?php
$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	$model->COMPETITION_ID=>array('view','id'=>$model->COMPETITION_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Competitions', 'url'=>array('index')),
	array('label'=>'Create Competitions', 'url'=>array('create')),
	array('label'=>'View Competitions', 'url'=>array('view', 'id'=>$model->COMPETITION_ID)),
	array('label'=>'Manage Competitions', 'url'=>array('admin')),
);
?>

<h1>Update Competitions <?php echo $model->COMPETITION_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>