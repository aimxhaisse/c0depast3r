<?php

// Path to the database file
define('DB_PATH', 'data/database.sqlite.db');

// IRC settings \0/
define('IRC_NAME', 'RegisRobertMan');
define('IRC_SERVER', 'irc.epitech.net');
define('IRC_CHAN', '#nantes');
define('IRC_INFO', 'http://pastebin.buffout.org http://pastebin.buffout.org http://pastebin.buffout.org');

define('IRC_SPOOL', '/tmp/ircspool/');

// send a message to irc :)
function irc_notice($message)
{
	file_put_contents(IRC_SPOOL . md5(rand()), $message);
}
