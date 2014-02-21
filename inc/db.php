<?php

// Install a new database if it does not exists yet
function	db_install()
{
  global	$global_db;

  $install = !file_exists(DB_PATH);
  $global_db['handler'] = new SQLite3(DB_PATH);

  if ($install && $global_db['handler'])
    {
      $global_db['handler']->query("CREATE TABLE c0depast3r ("
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

  return $global_db['handler']->lastInsertRowID();
}

// Add a new code, returns a string displayed on p_add
function	db_add_code($author, $code)
{
  global	$global_db;

  if (!$global_db['handler']) return "pr0bl3m s1re?";

  $author = $global_db['handler']->escapeString($author);
  $code = $global_db['handler']->escapeString($code);

  $global_db['handler']->exec(
		"INSERT INTO c0depast3r(id, code, author, date)" .
		"VALUES(NULL, '$code', '$author', DATE('NOW'));");

  $id = db_last_id();

  return 'c0de add3d (<a href="/view/'.$id.'">#'.$id.'</a>)';
}

// Add a new code, returns a string displayed on p_add
function	db_get_codes()
{
  global	$global_db;

  if (!$global_db['handler']) return false;

  $q = $global_db['handler']->query(
		   "SELECT id, author, date FROM c0depast3r
		      ORDER BY id DESC LIMIT 30");

  $entries = array();

  while ($entry = $q->fetchArray())
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

  $q = $global_db['handler']->query("SELECT id, author, code, date FROM c0depast3r WHERE id='$id'");

  return $q->fetchArray();
}
