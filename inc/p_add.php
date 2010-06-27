<?php

function	add_new_code()
{
  global	$_POST;

  $author = isset($_POST['author']) ? addslashes($_POST['author']) : "an0n";
  $code = isset($_POST['code']) ? addslashes($_POST['code']) : false;

  return $code ? db_add_code($author, $code) : "P0st a n3w c0de";
}

$message = add_new_code();

?>
<div id="p_add">
  <h2><?php echo $message ?></h2>
  <form name="code_add" action="" method="POST">
    <input type="text" name="author" value="auth0r" class="clean_on_click" />
    <br />
    <textarea name="code" rows="20" cols="30" ></textarea>
    <br />
    <input type="submit" value="s3nd" />
  </form>
</div>
