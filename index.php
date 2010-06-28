<?php

error_reporting(0);

// Some globals containers
$global_db = array('handler' => false);

require_once("/inc/config.php");
require_once("/inc/db.php");

db_install();

?>
<html>
  <head>
    <title>c0depast3r</title>
    <link rel="stylesheet" type="text/css" charset="utf-8" media="all" href="/style.css">
    <link href="/prettify/prettify.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/prettify/prettify.js"></script>
  </head>
  <body onload="prettyPrint()">
    <div id="c0nt3nt">
      <div id="h34d3r">
	<img src="/banner.png" alt="banner" />
      </div>
      <div id="m3nu">
       <a href="?p=add"><img src="/new.png" alt="add a new entry" /></a>
       <a href="?p=list"><img src="/latest.png" alt="list recent entries" /></a>
      </div>
      <div id="p4g3">
	<?php require_once('/inc/dispatcher.php') ?>
      </div>
    </div>
  </body>
</html>
