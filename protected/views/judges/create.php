<?php
$this->breadcrumbs=array(
	'Judges'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Judges', 'url'=>array('index')),
	array('label'=>'Manage Judges', 'url'=>array('admin')),
);
?>

<h1>Create Judges</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>