<?php
$this->breadcrumbs=array(
	'User Companies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserCompanies', 'url'=>array('index')),
	array('label'=>'Manage UserCompanies', 'url'=>array('admin')),
);
?>

<h1>Create UserCompanies</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>