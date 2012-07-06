<?php
$this->breadcrumbs=array(
	'Rounds',
);

$this->menu=array(
	array('label'=>'Create Rounds', 'url'=>array('create')),
	array('label'=>'Manage Rounds', 'url'=>array('admin')),
);
?>

<h1>Rounds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
