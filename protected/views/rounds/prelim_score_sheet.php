<h3>Score Sheet </h3>
<p>
  <h3>Event: <?php echo $event->EVENT_NAME; ?></h3>
  <h3>Round Number: <?php echo $round->ROUND_NO; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yes:&nbsp;<?php echo $event->YESES; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alt:&nbsp;<?php echo $event->ALT; ?>&nbsp;&nbsp;</h3>
  <h2>Judge: <?php //echo $judge->JUDGE_ID;
		  //echo " - ";
		  echo $judge->FIRST_NAME; ?></h2>
</p>

<table border="1" bordercolor="000000" width="600" cellpadding="1" cellspacing="1">
	<tr>
		<th><?php echo "Bib #"; ?></th>
		<th><?php echo "Name"; ?></th>
		<th><?php echo "Comments"; ?></th>
		<th><?php echo "Yes"; ?></th>
		<th><?php echo "No"; ?></th>
		<th><?php echo "Alt #"; ?></th>
	</tr>
	<?php foreach($competitors as $competitor): ?>
	<tr>
		<td>
		    <b><?php echo ($competitor->BIB_NUMBER) ? $competitor->BIB_NUMBER : "&nbsp" ?></b>
		</td>
		<?php if ($followers[$partnerships[$competitor->COMPETITOR_ID]]){ ?>
		<td width="230">
		    <b><?php echo ($competitor->FIRST_NAME) ? $competitor->FIRST_NAME : "&nbsp" ?></b> & <b><?php echo $followers[$partnerships[$competitor->COMPETITOR_ID]]->FIRST_NAME ?></b>
		</td>
		<?php } else { ?>
		  <td>
		  <b><?php echo ($competitor->FIRST_NAME) ? $competitor->FIRST_NAME : "&nbsp" ?></b>
		  </td>
		<?php } ?>
		<td width="450">&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
</table>
<p style="font-family:verdana,arial,sans-serif;font-size:10px;"></p>


