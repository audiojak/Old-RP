<h1>Ranks for Final Round <?php echo $model->ROUND_NO; ?> - <?php echo $event->EVENT_NAME; ?></h1>

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
    <?php if (count($followers) > 0){
        echo CHtml::encode($competitor->BIB_NUMBER.' -  '.$competitor->FIRST_NAME.' and '.$followers[$competitor->COMPETITOR_ID]->FIRST_NAME);
      } else {
        echo CHtml::encode($competitor->BIB_NUMBER.' -  '.$competitor->FIRST_NAME.' '.$competitor->LAST_NAME);
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

<br />
<button type="submit">
  Re-Rank
</button>
<?php echo CHtml::hiddenField('event_id',$model->EVENT_ID); ?>
<?php echo CHtml::hiddenField('round_id',$model->ROUND_ID); ?>
<?php echo CHtml::endForm(); ?>
<p>
<h1>Workings for Round <?php echo $model->ROUND_NO; ?></h1>
</p>
<table>
  <thead>
  <tr>
    <th><?php echo "Ranks awarded"; ?></th>
    <?php foreach($rank_options as $ro): ?>
       <th><?php echo $ro; ?></th>
    <?php endforeach; ?>
  </tr>
  </thead>
 
  <?php foreach($competitor_rank_array as $competitor): ?>
  <tr>
    <td>
    <?php if (count($followers) > 0){
        echo CHtml::encode($competitor->BIB_NUMBER.' -  '.$competitor->FIRST_NAME.' and '.$followers[$competitor->COMPETITOR_ID]->FIRST_NAME);
      } else {
        echo CHtml::encode($competitor->BIB_NUMBER.' -  '.$competitor->FIRST_NAME.' '.$competitor->LAST_NAME);
      }
    ?>
    </td>
       <?php foreach($rank_options as $key => $value): ?>
    <td>
    <?php echo $working_tallys[$competitor->COMPETITOR_ID][$key].' ('.$working_sums[$competitor->COMPETITOR_ID][$key].')'; ?>
    </td>
       <?php endforeach; ?>
  </tr>
  <?php endforeach; ?>
</table>
<p>
<h1>Results for Round <?php echo $model->ROUND_NO; ?></h1>
</p>

<table>
  <tr>
    <th><?php echo "Ranks"; ?></th>
    <th><?php echo "Competitors"; ?></th>
  </tr>
 
  <?php foreach($competitor_rank_array as $rank => $competitor): ?>
  <tr>
    <td>
    <?php echo $rank; ?>
    </td>
    <td>
    <?php if (count($followers) > 0){
        echo CHtml::encode($competitor->BIB_NUMBER.' -  '.$competitor->FIRST_NAME.' and '.$followers[$competitor->COMPETITOR_ID]->FIRST_NAME);
      } else {
        echo CHtml::encode($competitor->BIB_NUMBER.' -  '.$competitor->FIRST_NAME.' '.$competitor->LAST_NAME);
      }
    ?>
    </td>
  </tr>
  <?php endforeach; ?>
</table>

<br />
<br />
<FORM>
<INPUT TYPE="button" VALUE="Print" onClick="window.open('/rounds/print/<?php echo $model->ROUND_ID; ?>','results','width=600,height=800')">
</FORM>