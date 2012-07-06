<?php
$this->breadcrumbs=array(
	'Competitors',
);

$this->menu=array(
	array('label'=>'Create Competitors', 'url'=>array('create')),
	array('label'=>'Manage Competitors', 'url'=>array('admin')),
);
?>

<h1>Competitors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
