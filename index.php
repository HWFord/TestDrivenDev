<?php
    require_once('templates/header.php');
    if(isset($_GET['room']) and isset($_GET['page'])) 
    { 
      include('templates/room.php');
    } 
    else if(isset($_GET['page'])) 
    {
      switch($_GET['page']) {
        case 'salon': {
            include('templates/salon.php');
            break;
        }
        case 'home': {
            include('templates/home.php');
            break;
        }
        case 'login': {
          include('templates/login.php');
          break;
        }
      } 
    } 
    else 
    {
      require_once('templates/login.php');
    }
?>
