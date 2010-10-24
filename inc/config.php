<?php

// Path to the database file
define('DB_PATH', 'data/database.sqlite.db');

// IRC settings \0/
define('IRC_NAME', 'RegisRobertMan');
define('IRC_SERVER', 'irc.epitech.net');
define('IRC_CHAN', '#nantes');
define('IRC_INFO', 'http://pastebin.buffout.org http://pastebin.buffout.org http://pastebin.buffout.org');

// send a message to irc :)
function irc_notice($message)
{
	$sock = fsockopen(IRC_SERVER, 6667);
	if ($sock) {
		fwrite($sock, "PASS NOPASS\n\r");
		fwrite($sock, "NICK " . IRC_NAME . "\n\r");
		fwrite($sock, "USER " . IRC_NAME . " " . IRC_INFO . "\n\r");
		fwrite($sock, "JOIN " . IRC_CHAN . "\n\r");
		fwrite($sock, "PRIVMSG ". IRC_CHAN ." :$message\r\n");
		fflush($sock);
		sleep(0.5);
		fclose($sock);
	}
}
