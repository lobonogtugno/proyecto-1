<?php
include('../modelo/conexion.php');
$Datos=Array(
    'id'=>$_POST['id'],
);
if ($objeto=new conexion()) {
    if ($val=$objeto->busca_producto_id($Datos)) {
        $objeto->cerrar();
        require_once('../includes/client/detalles_producto.php');
    }
    else{
       
    }
}
else{
    echo "eror de conexion";
}
?>