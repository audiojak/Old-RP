<p>
<h1>Results </h1>
</p>
<p>
  <h2>Event <?php echo $event->EVENT_NAME; ?></h2>
  <h2>Round Number <?php echo $round->ROUND_NO; ?></h2>
</p>

<table>
  <tr>
    <th><?php echo "Rank"; ?></th>
    <th><?php echo "Competitors"; ?></th>
  </tr>
 
  <?php foreach($competitor_rank_array as $rank => $competitor): ?>
  <tr>
    <td>
    <?php echo $rank; ?>
    </td>
    <td>
    <?php echo '<b>'.$competitor->FIRST_NAME.' '.$competitor->LAST_NAME.'</b> and <b>'.$followers[$competitor->COMPETITOR_ID]->FIRST_NAME.' '.$followers[$competitor->COMPETITOR_ID]->LAST_NAME.'</b>'; ?>
    </td>
  </tr>
  <?php endforeach; ?>
</table>