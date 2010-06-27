<?php

function	view_code()
{
  global	$_GET;

  $id = isset($_GET['code']) ? (int) $_GET['code'] : false;
  $entry = $id > 0 ? db_get_code($id) : false;

  return array('code'	=> $entry ? $entry['code'] : "1 can haz c0de?!",
	       'date'	=> $entry ? $entry['date'] : "1 can haz date!?",
	       'author' => $entry ? $entry['author'] : "hump4",
	       'id'	=> $entry ? $entry['id'] : '1337');
}

$code = view_code();

?>
<div id="p_view">
  <h2>vi3wing c0de #<?php echo $code['id'] ?> fr0m <?php echo $code['author'] ?></h2>
  <pre class="prettyprint"><?php echo stripslashes($code['code']) ?></pre>
</div>
