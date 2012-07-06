<?php
$this->breadcrumbs=array(
	'Judges'=>array('index'),
	$model->JUDGE_ID=>array('view','id'=>$model->JUDGE_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Judges', 'url'=>array('index')),
	array('label'=>'Create Judges', 'url'=>array('create')),
	array('label'=>'View Judges', 'url'=>array('view', 'id'=>$model->JUDGE_ID)),
	array('label'=>'Manage Judges', 'url'=>array('admin')),
);
?>

<h1>Update Judges <?php echo $model->JUDGE_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>