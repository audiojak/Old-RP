<?php
$this->breadcrumbs=array(
	'Competitions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Competitions', 'url'=>array('index')),
	array('label'=>'Manage Competitions', 'url'=>array('admin')),
);
?>

<h1>Create Competitions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>