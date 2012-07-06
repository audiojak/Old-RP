<?php
$this->breadcrumbs=array(
	'Competitors'=>array('index'),
	$model->COMPETITOR_ID=>array('view','id'=>$model->COMPETITOR_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Competitors', 'url'=>array('index')),
	array('label'=>'Create Competitors', 'url'=>array('create')),
	array('label'=>'View Competitors', 'url'=>array('view', 'id'=>$model->COMPETITOR_ID)),
	array('label'=>'Manage Competitors', 'url'=>array('admin')),
);
?>

<h1>Update Competitors <?php echo $model->COMPETITOR_ID; ?></h1>

<?php 
    $cl = $model->complevels;
    if ($cl){
        $config = array('keyField' => 'LEVEL_ID');
        foreach ($cl as $complevel) {
            $rawData[] = array('CC_ID' => $complevel->CC_ID, 'LEVELS' => $complevel->level->LEVEL_NAME);
            }
            $dataProvider = new CArrayDataProvider($rawData, $config);
            
            $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider'=>$dataProvider,
                'columns'=>array(
                    'LEVELS',
                    array(
                        'class'=>'CButtonColumn',
                        'template' => '{delete}',
                        'deleteButtonUrl'=>'Yii::app()->createUrl("/competitorcompetitions/delete", array("id"=>$data["CC_ID"]))'
                        )
                )
        ));
    }
    
    ?>
    

<?php echo $this->renderPartial('_form', array('model'=>$data)); ?>