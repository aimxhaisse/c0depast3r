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
    <link rel="stylesheet" type="text/css" charset="utf-8" media="all" href="/style.css">
    <link href="/prettify/prettify.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/prettify/prettify.js"></script>
  </head>
  <body onload="prettyPrint()">
    <div id="c0nt3nt">
      <div id="h34d3r">
	<center>
	<a href="http://pastebin.buffout.org">
	<img src="/banner.png" alt="banner" />
        </a>
	</center>
      </div>
      <div id="m3nu">
	<center>
	<a href="/add"><img src="/new.png" alt="add a new entry" /></a>
	<a href="/latest"><img src="/latest.png" alt="list recent entries" /></a>
	</center>
      </div>
      <div id="p4g3">
	<?php require_once('inc/dispatcher.php') ?>
      </div>
      <br />
      <center>
        <img src="/fouteur.png" alt="f0ot3r" />
        <br />
        <a href="http://pastebin.buffout.org/view/170">p@st3 fr0m 3m@c5 !i!i!i!i!i!</a>
        <br />
        <a href="http://buffout.org/">p0w3r3d by buff0ut</a>
        <br />
        <img src="/fouteur.png" alt="f0ot3r" />
        <br />
        <br />
      </center>
    </div>
  </body>
</html>
