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

// Add a new code, returns a string displayed on p_add
function	db_add_code($author, $code)
{
  global	$global_db;

  if (!$global_db['handler']) return "pr0bl3m s1re?";

  sqlite_exec($global_db['handler'], 
	      "INSERT INTO c0depast3r(id, code, author, date)" .
	      "VALUES(NULL, '$code', '$author', DATE('NOW'));");

  return "c0de add3d";
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
