<?php
$this->breadcrumbs=array(
	'Heats',
);

$this->menu=array(
	array('label'=>'Create Heats', 'url'=>array('create')),
	array('label'=>'Manage Heats', 'url'=>array('admin')),
);
?>

<h1>Heats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
