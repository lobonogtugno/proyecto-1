<?php
include('../modelo/conexion.php');
if (isset($_POST['nombre'])&&
    isset($_POST['edad'])&&
    isset($_POST['correo'])&&
    isset($_POST['usuario'])&&
    isset($_POST['pass'])) {
   $Datos = array(
       'nombre' => $_POST['nombre'],
       'edad'=>$_POST['edad'],
       'correo'=>$_POST['correo'],
       'user'=>$_POST['usuario'],
       'pass'=>$_POST['pass'],
     );
     if ($objeto=new conexion()) {
         if ($objeto->registrar_usuario($Datos)) {
             //print_r($Datos);
            $objeto->cerrar();
             echo 1;
         }
         else{
             echo 0;
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