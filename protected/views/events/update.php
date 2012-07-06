<?php
$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->EVENT_ID=>array('view','id'=>$model->EVENT_ID),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Events', 'url'=>array('index')),
	//array('label'=>'Create Events', 'url'=>array('create')),
	array('label'=>'View Event', 'url'=>array('view', 'id'=>$model->EVENT_ID)),
        array('label'=>'Update Competitors', 'url'=>array('competitors', 'id'=>$model->EVENT_ID)),
        array('label'=>'Update Couples', 'url'=>array('couples', 'id'=>$model->EVENT_ID)),
        array('label'=>'Update Judges', 'url'=>array('judges', 'id'=>$model->EVENT_ID)),
	array('label'=>'Judge Event', 'url'=>array('judge', 'id'=>$model->EVENT_ID)),
        array('label'=>'Review Event', 'url'=>array('review', 'id'=>$model->EVENT_ID)),
	array('label'=>'Delete Event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->EVENT_ID),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Events', 'url'=>array('admin')),
);
?>

<h1>Update Events <?php echo $model->EVENT_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>