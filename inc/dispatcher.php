<?php

// This script is always called, it requires the good page
// according to the value of $_GET['p'].

function	dispatcher()
{
  $page = isset($_GET['p']) && $_GET['p'];

  switch ($page)
    {
    case 'list':
      return 'p_list.php';
    
    case 'view':
      return 'p_view.php';

    case 'add':
      return 'p_add.php';

    default:
      return 'p_default.php';
    }
}

require_once(dispatcher());
