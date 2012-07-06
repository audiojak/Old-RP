<?php
$this->breadcrumbs=array(
	'Levels',
);

$this->menu=array(
	array('label'=>'Create Levels', 'url'=>array('create')),
	array('label'=>'Manage Levels', 'url'=>array('admin')),
);
?>

<h1>Levels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
