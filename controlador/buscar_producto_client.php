<?php
include('../modelo/conexion.php');
$Datos=Array(
    'categoria'=>$_POST['categ'],
    'patron'=>$_POST['busca'],
);
if ($objeto=new conexion()) {
    if ($consulta=$objeto->busca_producto($Datos)) {
        $objeto->cerrar();
        
        require_once('../includes/client/datos_client.php');
    }
    else{
       
    }
}
else{
    echo "eror de conexion";
}
?>