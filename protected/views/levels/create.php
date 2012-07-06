<?php
$this->breadcrumbs=array(
	'Levels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Levels', 'url'=>array('index')),
	array('label'=>'Manage Levels', 'url'=>array('admin')),
);
?>

<h1>Create Levels</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>