<?php

error_reporting(E_ALL);

// Some globals containers
$global_db = array('handler' => false);

require_once("inc/config.php");
require_once("inc/db.php");

db_install();

?>
<html>
  <head>
    <title>c0depast3r</title>
    <link rel="stylesheet" type="text/css" charset="utf-8" media="all" href="style.css">
  </head>
  <body>
    <div id="c0nt3nt">
      <div id="h34d3r">
	<h1>c0depast3r</h1>
      </div>
      <div id="p4g3">
	<?php require_once('inc/dispatcher.php') ?>
      </div>
    </div>
  </body>
</html>
