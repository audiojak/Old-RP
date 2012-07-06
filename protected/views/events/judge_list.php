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
 
<h1>Update Judge List for <?php echo $model->EVENT_NAME; ?></h1>
 
<?php echo CHtml::beginForm("", "post", array("id"=>"myForm")); ?>
 
<table>
  <tr>
    <th><?php echo "First Name"; ?></th>
    <th><?php echo "Last Name"; ?></th>
    <th><?php echo "Judging"; ?></th>
    <th><?php echo "Head Judge"; ?></th>
    <th>
    All <?php echo CHtml::activeCheckBox($form, "checkAll", array ("class" => "checkAll")); ?>
    <button type="submit"> <!--onClick="byebye()"--> 
      Update
    </button>
    </th>
  </tr>
 
  <?php foreach($models as $n=>$rec): ?>
  <tr>
    <td>
    <?php echo CHtml::encode($rec->FIRST_NAME); ?>
    </td>
    <td>
    <?php echo CHtml::encode($rec->SECOND_NAME); ?>
    </td>
    <td>
    <?php echo (array_key_exists($rec->JUDGE_ID,$in_event)) ? CHtml::activeCheckBox($form, "$rec->JUDGE_ID", array ('checked'=>'checked')) : CHtml::activeCheckBox($form, "$rec->JUDGE_ID"); ?>
    </td>
    <td>
    <?php echo (array_key_exists($rec->JUDGE_ID,$event_head)) ? CHtml::activeRadioButton($form, "head", array('value'=>$rec->JUDGE_ID,'checked'=>'checked')) : CHtml::activeRadioButton($form, "head", array('value'=>$rec->JUDGE_ID)); ?>
    </td>
  </tr>
  <?php endforeach; ?>
 
</table>
<?php echo CHtml::hiddenField('event_id',$model->EVENT_ID); ?>
<?php echo CHtml::endForm(); ?>