<?php
$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Events', 'url'=>array('index')),
	array('label'=>'Create Events', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('events-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Events</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'events-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'EVENT_ID',
		'COMPETITION_ID',
		'EVENT_NAME',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
