<?php
$this->breadcrumbs=array(
	'Judges',
);

$this->menu=array(
	array('label'=>'Create Judges', 'url'=>array('create')),
	array('label'=>'Manage Judges', 'url'=>array('admin')),
);
?>

<h1>Judges</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
