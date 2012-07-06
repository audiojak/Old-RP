<h3><?php echo $event->EVENT_NAME; ?></h3>
<h1>Enter the ranks for Round <?php echo $model->ROUND_NO; ?></h1>
<h2>Number of competitors <?php echo count($competitors); ?></h2>

<?php echo CHtml::beginForm("", "post", array("id"=>"myForm")); ?>
 
<table>
  <tr>
    <th><?php echo "Competitors"; ?></th>
    <?php foreach($judges as $judge): ?>
       <th><?php echo $judge->JUDGE_ID; ?></th>
    <?php endforeach; ?>
  </tr>
 
  <?php foreach($competitors as $competitor): ?>
  <tr>
    <td>
    <?php echo CHtml::encode($competitor->FIRST_NAME.' '.$competitor->LAST_NAME); ?>
    </td>
       <?php foreach($judges as $judge): ?>
    <td>
    <?php echo CHtml::dropDownList('ranks['.$competitor->COMPETITOR_ID.']['.$judge->JUDGE_ID.']',$ranks[$competitor->COMPETITOR_ID][$judge->JUDGE_ID],$rank_options); ?>
    </td>
       <?php endforeach; ?>
  </tr>
  <?php endforeach; ?>
</table>
<?php echo CHtml::label('Competitors to pass to the next round','passthrough').'    '; echo CHtml::textField('passthrough',$model->EVENT_ID,array('size' => 2)); ?>
<br />
<br />
<button type="submit">
  Rank
</button>
<?php if ($failed_checksums) { ?>
<br />
<br />
<?php foreach($failed_checksums as $judge => $fc): ?>
  <strong> Please correct the rankings for Judge <?php echo $judge ?> </strong><br />
<?php endforeach; ?>
<?php } ?>

<?php echo CHtml::hiddenField('event_id',$model->EVENT_ID); ?>
<?php echo CHtml::hiddenField('round_id',$model->ROUND_ID); ?>
<?php echo CHtml::endForm(); ?>