<?php
$this->breadcrumbs=array(
	'Competitors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Competitors', 'url'=>array('index')),
	array('label'=>'Manage Competitors', 'url'=>array('admin')),
);
?>

<h1>Create Competitors</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>