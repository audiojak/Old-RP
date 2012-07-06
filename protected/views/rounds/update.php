<?php
$this->breadcrumbs=array(
	'Rounds'=>array('index'),
	$model->ROUND_ID=>array('view','id'=>$model->ROUND_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rounds', 'url'=>array('index')),
	array('label'=>'Create Rounds', 'url'=>array('create')),
	array('label'=>'View Rounds', 'url'=>array('view', 'id'=>$model->ROUND_ID)),
	array('label'=>'Manage Rounds', 'url'=>array('admin')),
);
?>

<h1>Update Rounds <?php echo $model->ROUND_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>