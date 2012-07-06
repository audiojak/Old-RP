<?php
$this->breadcrumbs=array(
	'Competitions',
);

$this->menu=array(
	array('label'=>'Create Competitions', 'url'=>array('create')),
	array('label'=>'Choose Competition', 'url'=>array('choose')),
	array('label'=>'Manage Competitions', 'url'=>array('admin')),
);
?>

<h1>Competitions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
