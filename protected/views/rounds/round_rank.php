<h3><?php echo $event->EVENT_NAME; ?></h3>
<?php if ($model->IS_FINAL) { ?>
<h1>Enter the ranks for the Final - Round <?php echo $model->ROUND_NO; ?></h1>
<?php } else {?>
<h1>Enter the ranks for Round <?php echo $model->ROUND_NO; ?></h1>
<?php } ?>
<h3>Number of competitors: <?php echo count($competitors); ?></h3>
<?php echo CHtml::beginForm("", "post", array("id"=>"myForm")); ?>

<table>
  <tr>
    <th><?php echo "Competitors"; ?></th>
    <?php foreach($judges as $judge): ?>
       <th><?php echo $judge_names[$judge->JUDGE_ID]->FIRST_NAME; ?></th>
    <?php endforeach; ?>
  </tr>
 
  <?php foreach($competitors as $competitor): ?>
  <tr>
    <td>
      <?php if (count($followers) > 0){
        echo CHtml::encode($competitor->BIB_NUMBER.' -  '.$competitor->FIRST_NAME.' and '.$followers[$competitor->COMPETITOR_ID]->FIRST_NAME);
      } else {
        echo CHtml::encode($competitor->BIB_NUMBER.' -  '.$competitor->FIRST_NAME);
      }
      ?>
    </td>
       <?php foreach($judges as $judge): ?>
    <td>
    <?php echo CHtml::dropDownList('ranks['.$competitor->COMPETITOR_ID.']['.$judge->JUDGE_ID.']',$ranks[$competitor->COMPETITOR_ID][$judge->JUDGE_ID],$rank_options); ?>
    </td>
       <?php endforeach; ?>
  </tr>
  <?php endforeach; ?>
  
  <tr>
    <th><?php echo "Print Score Sheets"; ?></th>
    <?php foreach($judges as $judge): ?>
      <td>  
        <FORM>
          <INPUT TYPE="button" VALUE="Print" onClick="parent.location='/rounds/scoresheet/<?php echo $model->ROUND_ID."/".$judge->JUDGE_ID; ?>'">
        </FORM>
      </td>
    <?php endforeach; ?>
  </tr>
</table>
<?php if (!$model->IS_FINAL) { ?>
<?php echo CHtml::label('Competitors to pass to the next round','passthrough').'    '; echo CHtml::textField('passthrough',$model->PASSTHROUGH,array('size' => 2)); ?>
<?php } ?>
<br />
<br />

<button type="submit">
  Calculate Ranks
</button>
<?php if (isset($failed_checksums)) { ?>
<br />
<br />
<?php foreach($failed_checksums as $judge => $fc): ?>
  <strong> Please correct the rankings for Judge <?php echo $judge ?> </strong><br />
<?php endforeach; ?>
<?php } ?>

<?php echo CHtml::hiddenField('event_id',$model->EVENT_ID); ?>
<?php echo CHtml::hiddenField('round_id',$model->ROUND_ID); ?>
<?php echo CHtml::endForm(); ?>

<br />
<FORM>
<INPUT TYPE="button" VALUE="Rank By Judge" onClick="parent.location='/rounds/rankbyjudge/<?php echo $model->ROUND_ID; ?>'">
</FORM>
<FORM>
<INPUT TYPE="button" VALUE="Print Announcement" onClick="window.open('/rounds/announcement/<?php echo $model->ROUND_ID; ?>','Announcement','width=600,height=800')">
</FORM> 