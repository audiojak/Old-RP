<?php
$this->breadcrumbs=array(
	'Rounds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rounds', 'url'=>array('index')),
	array('label'=>'Manage Rounds', 'url'=>array('admin')),
);
?>

<h1>Create Rounds</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>