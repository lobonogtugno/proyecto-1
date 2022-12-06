<?php
if (!isset($_SESSION)) {
    session_start();
  }
if (isset($_SESSION['usuario']) && ($_SESSION['usuario']!='') && 
isset($_SESSION['ide']) &&($_SESSION['ide']!='') && 
isset($_SESSION['acceso'])
) {
    require('../includes/header.php');

}
else{
    require('../includes/header.php');

}
?>