<?php
$this->breadcrumbs=array(
	'Competitors'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Competitors', 'url'=>array('index')),
	array('label'=>'Create Competitors', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('competitors-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Competitors</h1>

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
	'id'=>'competitors-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'COMPETITOR_ID',
		'FIRST_NAME',
		'LAST_NAME',
		'COMPETITOR_LEVEL',
		'LEADER',
		'REGISTERED',
		'BIB_STATUS',
		'BIB_NUMBER',
		'WSDC_NO',
		/*
		'CITY',
		'STATE',
		'POSTCODE',
		'COUNTRY',
		'PHONE',
		'MOBILE',
		'EMAIL',
		'REMOVED',
		'ADDRESS',
		*/
		array(
			'class'=>'CButtonColumn',
			'updateButtonUrl'=>'Yii::app()->createUrl("/competitors/globalupdate", array("id"=>$data["COMPETITOR_ID"]))'
		),
	),
)); ?>
