<h1>View list of rounds <?php echo $model->EVENT_NAME; ?></h1>
 
<table>
  <?php foreach($rounds as $round): ?>
  <tr>
    <td>
      <?php if ($round['IS_FINAL']){ ?>
      <?php echo CHtml::link('Judge Final Round '.$round['ROUND_NO'],'/rounds/judge/'.$round['ROUND_ID']); ?>
      <?php } else { ?>
      <?php echo CHtml::link('Judge Round '.$round['ROUND_NO'],'/rounds/judge/'.$round['ROUND_ID']); ?>
      <?php } ?>
    </td>
  </tr>
  <?php endforeach; ?>
 
 <?php echo CHtml::beginForm("", "post", array("id"=>"myForm")); ?>
 <?php echo CHtml::hiddenField('EventReset',1); ?>
 <?php echo CHtml::endForm(); ?>
</table>