<p>
<h1>Announcement Sheet </h1>
</p>
<p>
  <h2>Event: <?php echo $event->EVENT_NAME; ?></h2>
  <h2>Round Number: <?php echo $round->ROUND_NO; ?></h2>
</p>

<table border="1" bordercolor="000000" width="600" cellpadding="3" cellspacing="3">
	<tr>
		<th><?php echo "Bib Number"; ?></th>
		<th><?php echo "Leader"; ?></th>
		<th><?php echo "Follower"; ?></th>
	</tr>
	<?php foreach($competitors as $competitor): ?>
	<tr>
		<td>
		    <?php echo ($competitor->BIB_NUMBER) ? $competitor->BIB_NUMBER : "&nbsp" ?>
		</td>
		<td>
		    <?php echo $competitor->FIRST_NAME.' '.$competitor->LAST_NAME; ?>
		</td>
		<td>
		    <?php echo $followers[$competitor->COMPETITOR_ID]->FIRST_NAME.' '.$followers[$competitor->COMPETITOR_ID]->LAST_NAME; ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<p style="font-family:verdana,arial,sans-serif;font-size:10px;"></p>


