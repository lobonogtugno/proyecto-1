<?php
include('../modelo/conexion.php');
$Datos = array(
    'op' => $_POST['cargar']
  );
    if ($objeto=new conexion()) {
        if ($consulta=$objeto->consulta($Datos)) {
            $objeto->cerrar();
            
            require_once('../includes/client/datos_client.php');
        }
        else{
           // echo "eror de conexion";
        }
    }


?>