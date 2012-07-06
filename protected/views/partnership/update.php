<?php
$this->breadcrumbs=array(
	'Partnerships'=>array('index'),
	$model->pid=>array('view','id'=>$model->pid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Partnership', 'url'=>array('index')),
	array('label'=>'Create Partnership', 'url'=>array('create')),
	array('label'=>'View Partnership', 'url'=>array('view', 'id'=>$model->pid)),
	array('label'=>'Manage Partnership', 'url'=>array('admin')),
);
?>

<h1>Update Partnership <?php echo $model->pid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>