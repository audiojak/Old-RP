<?php if ($model->IS_FINAL) { ?>
<h1>Enter the ranks for the Final - Round <?php echo $model->ROUND_NO; ?></h1>
<?php } else {?>
<h1>Enter the ranks for Round <?php echo $model->ROUND_NO; ?></h1>
<?php } ?>
<?php echo CHtml::beginForm("", "post", array("id"=>"myForm")); ?>

<table>
  <tr>
    <td>
      <?php //create dropdown to select judges ?>
      <?php echo CHtml::dropDownList('judgeSelected',$judge->JUDGE_ID,$judges_array,array('onchange' => 'this.form.submit();')); ?>
      <!-- <button type="submit" name="view"> View </button> -->
    </td>
  </tr>
  <tr>
    <th><?php echo "Competitors"; ?></th>

       <th><?php echo $judge->JUDGE_ID.' '.$judge->FIRST_NAME; ?></th>

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

    <td>
      <?php //dropdown list syntax - name, select value, list of values ?>
      <div  onfocus="this.style.backgroundColor='#f3f3f3';" >
      <?php echo CHtml::dropDownList('ranks['.$competitor->COMPETITOR_ID.']['.$judge->JUDGE_ID.']',$ranks[$competitor->COMPETITOR_ID][$judge->JUDGE_ID],$rank_options); ?>
      </div>
    </td>

  </tr>
  <?php endforeach; ?>
</table>

<?php if($failed_checksum){ ?>
<strong> Please correct the rankings. </strong><br />
<?php } ?>

<br />
<br />
<button type="submit" name="update">
  Update
</button>
<button type="submit" name="next">
  Update and Next
</button>
<h2><a href="/rounds/judge/<?php echo $model->ROUND_ID; ?>" >Rank </a></h2>

<?php echo CHtml::hiddenField('event_id',$model->EVENT_ID); ?>
<?php echo CHtml::hiddenField('round_id',$model->ROUND_ID); ?>
<?php echo CHtml::endForm(); ?>