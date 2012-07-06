<p>
<h1>Score Sheet </h1>
</p>
<p>
  <h2>Event: <?php echo $event->EVENT_NAME; ?></h2>
  <h2>Round Number: <?php echo $round->ROUND_NO; ?></h2>
  <h2>Judge: <?php //echo $judge->JUDGE_ID;
		  //echo " - ";
		  echo $judge->FIRST_NAME; ?></h2>
</p>

<table border="1" bordercolor="000000" width="600" cellpadding="3" cellspacing="3">
	<tr>
		<th><?php echo "Bib Number"; ?></th>
		<th><?php echo "Competitor"; ?></th>
		<th><?php echo "Comments"; ?></th>
		<th><?php echo "Rank #"; ?></th>
	</tr>
	<?php foreach($competitors as $competitor): ?>
	<tr>
		<td>
		    <?php echo ($competitor->BIB_NUMBER) ? $competitor->BIB_NUMBER : "&nbsp" ?>
		</td>
		<td>
		    <b><?php echo ($competitor->FIRST_NAME) ? $competitor->FIRST_NAME : "&nbsp" ?></b> & <b><?php echo $followers[$partnerships[$competitor->COMPETITOR_ID]]->FIRST_NAME ?></b>
		</td>
		<td width="350">&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
</table>
<p style="font-family:verdana,arial,sans-serif;font-size:10px;"></p>


