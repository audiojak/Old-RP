<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script language="javascript">
  function byebye ()
  {
    // need a confirmation before submiting
    if (confirm('Are you sure ?'))          
      $("#myForm").submit ();
  }
 
  $(document).ready(function(){
    // powerful jquery ! Clicking on the checkbox 'checkAll' change the state of all checkbox  
    $('.checkAll').click(function () {
      $("input[type='checkbox']:not([disabled='disabled'])").attr('checked', this.checked);
    });
  });
</script>
 
<h1>Update Partnership List for <?php echo $model->EVENT_NAME; ?></h1>
 
<?php echo CHtml::beginForm("", "post", array("id"=>"myForm")); ?>
 

  
<table>
  <tr>
    <th><?php echo "Leader Name"; ?></th>
    <th>

    </th>
  </tr>
  <?php foreach($leaders as $leader): ?>
  <tr>
    <td>
    <?php echo CHtml::encode($leader->FIRST_NAME.' '.$leader->LAST_NAME); ?>
    </td>
    <td>
    <?php echo (array_key_exists($leader->COMPETITOR_ID,$partnerships)) ? CHtml::activeDropDownList($form, $leader->COMPETITOR_ID, $possible_followers, array('options' => array($partnerships[$leader->COMPETITOR_ID] => array('selected' => true)))) : CHtml::activeDropDownList($form, $leader->COMPETITOR_ID, $possible_followers) ?>
    </td>
  </tr>
  <?php endforeach; ?>
 
</table>
    <button type="submit"> <!--onClick="byebye()"--> 
      Update
    </button>
<?php echo CHtml::hiddenField('event_id',$model->EVENT_ID); ?>
<?php echo CHtml::endForm(); ?>