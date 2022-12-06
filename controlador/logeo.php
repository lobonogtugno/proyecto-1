<?php
include('../modelo/conexion.php');
if (isset($_POST['usuario'])&&
    isset($_POST['pass'])) {
   $Datos = array(
       'user'=>$_POST['usuario'],
       'pass'=>$_POST['pass'],
     );
     if ($objeto=new conexion()) {
         if ($objeto->iniciar_session($Datos)) {
         }
     }
     else{
         echo "eror de conexion";
     }
}
else{
    echo "datos malos";
}

?>