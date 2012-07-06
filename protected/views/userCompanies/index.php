<?php
$this->breadcrumbs=array(
	'User Companies',
);

$this->menu=array(
	array('label'=>'Create UserCompanies', 'url'=>array('create')),
	array('label'=>'Manage UserCompanies', 'url'=>array('admin')),
);
?>

<h1>User Companies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
