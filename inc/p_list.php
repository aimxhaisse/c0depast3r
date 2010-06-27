<?php

$entries = db_get_codes();

?>

<div id="p_list">
  <h2>Lat3st entr13s</h2>
  <br />
  <?php foreach ($entries as $entry) : ?>
  <h3>
  <a href="?p=view&code=<?php echo $entry['id'] ?>">#<?php echo $entry['id'] ?></a> - <?php echo $entry['author'] ?> (<?php echo $entry['date'] ?>)
  </h3>
  <?php endforeach ?>
</div>
