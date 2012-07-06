<?php
$this->breadcrumbs=array(
	'Events'=>array('index'),
	$model->EVENT_ID,
);

$this->menu=array(
	//array('label'=>'List Events', 'url'=>array('index')),
	//array('label'=>'Create Events', 'url'=>array('create')),
	array('label'=>'Update Event', 'url'=>array('update', 'id'=>$model->EVENT_ID)),
	array('label'=>'Update Competitors', 'url'=>array('competitors', 'id'=>$model->EVENT_ID)),
	array('label'=>'Update Couples', 'url'=>array('couples', 'id'=>$model->EVENT_ID)), // @TODO fix for non-couple events
	array('label'=>'Update Judges', 'url'=>array('judges', 'id'=>$model->EVENT_ID)),
	array('label'=>'Judge Event', 'url'=>array('judge', 'id'=>$model->EVENT_ID)),
	array('label'=>'Review Event', 'url'=>array('review', 'id'=>$model->EVENT_ID)),
	array('label'=>'Delete Event', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->EVENT_ID),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Events', 'url'=>array('admin')),
);
?>

<h1>View Events #<?php echo $model->EVENT_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'EVENT_ID',
		'COMPETITION_ID',
		'EVENT_NAME',
		'REMOVED',
		'COMP_PER_HEAT',
		'SONGS_PER_HEAT',
		'MINS_PER_HEAT',
		'FINAL_COMPETITORS',
		'PROCEED_COMPETITORS',
		'FINAL_SONGS',
		'FINAL_MINUTES',
		'NUMBER_REPERCHARGE',
		'TOTAL_REPERCHARGE',
		'ALLOW_REPERCHARGE',
		'EVENT_LEVEL',
		'NUMBER_ROUNDS',
		'YESES',
		'NOES',
		'TYPE',
		'ALT',

	),
)); ?>
