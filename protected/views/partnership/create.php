<?php
$this->breadcrumbs=array(
	'Partnerships'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Partnership', 'url'=>array('index')),
	array('label'=>'Manage Partnership', 'url'=>array('admin')),
);
?>

<h1>Create Partnership</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>