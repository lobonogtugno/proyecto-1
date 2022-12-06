<?php
if (!isset($_SESSION)) {
    session_start();
  }
if (isset($_SESSION['usuario']) && ($_SESSION['usuario']!='') && 
isset($_SESSION['ide']) &&($_SESSION['ide']!='') && 
$_SESSION['acceso']==1
) {
    require('../includes/admin/main_header.php');

}
else{
    require('../includes/client/main_header.php');

}
?>