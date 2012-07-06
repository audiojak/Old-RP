<?php
$this->breadcrumbs=array(
	'Heats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Heats', 'url'=>array('index')),
	array('label'=>'Manage Heats', 'url'=>array('admin')),
);
?>

<h1>Create Heats</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>