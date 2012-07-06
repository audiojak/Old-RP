<?php
$this->breadcrumbs=array(
	'Partnerships',
);

$this->menu=array(
	array('label'=>'Create Partnership', 'url'=>array('create')),
	array('label'=>'Manage Partnership', 'url'=>array('admin')),
);
?>

<h1>Partnerships</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
