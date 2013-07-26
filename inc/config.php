<?php

// Path to the database file
define('DB_PATH', 'data/database.sqlite.db');

// send a message to irc :)
function irc_notice($message)
{
	$s = fsockopen("localhost", 3112);
	if ($s)
	{
		fwrite($s, sprintf("freenode 1 PRIVMSG ##sbrk :$message"));
		fclose($s);
	}
}
