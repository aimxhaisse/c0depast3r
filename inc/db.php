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
		 . " date INTEGER"
		 . " );");

    }

}
