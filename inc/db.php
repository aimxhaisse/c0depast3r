<?php

// Install a new database if it does not exists yet
function	db_install()
{
  global	$global_db;

  $install = !file_exists(DB_PATH);
  $global_db['handler'] = sqlite_open(DB_PATH);

  if ($install)
    {
      $db = new SQLiteDatabase(DB_PATH);

      if (!$db) return;

      $db->query("CREATE TABLE c0depast3r ("
		 . " id INTEGER PRIMARY KEY,"
		 . " code TEXT,"
		 . " author VARCHAR(255),"
		 . " date DATE"
		 . " );");

    }

}

// Returns last inserted id
function	db_last_id()
{
  global	$global_db;

  if (!$global_db['handler']) return 0;

  return sqlite_last_insert_rowid($global_db['handler']);
}

// Add a new code, returns a string displayed on p_add
function	db_add_code($author, $code)
{
  global	$global_db;

  if (!$global_db['handler']) return "pr0bl3m s1re?";

  $author = sqlite_escape_string($author);
  $code = sqlite_escape_string($code);

  sqlite_exec($global_db['handler'],
	      "INSERT INTO c0depast3r(id, code, author, date)" .
	      "VALUES(NULL, '$code', '$author', DATE('NOW'));");

  $id = db_last_id();

  irc_notice('pastebin.buffout.org -> c0de add3d [ http://pastebin.buffout.org/view/' . $id . ' ]');

  return 'c0de add3d (<a href="/view/'.$id.'">#'.$id.'</a>)';
}

// Add a new code, returns a string displayed on p_add
function	db_get_codes()
{
  global	$global_db;

  if (!$global_db['handler']) return false;

  $q = sqlite_query($global_db['handler'],
		   "SELECT id, author, date FROM c0depast3r
		      ORDER BY id DESC LIMIT 30");

  $entries = array();

  while ($entry = sqlite_fetch_array($q))
    {
      $entries[] = $entry;
    }

  return $entries;
}

// Get a new code
function	db_get_code($id)
{
  global	$global_db;

  if (!$global_db['handler']) return false;

  $q = sqlite_query($global_db['handler'],
		    "SELECT id, author, code, date FROM c0depast3r WHERE id='$id'");

  return sqlite_fetch_array($q);
}
