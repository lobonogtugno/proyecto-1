<?php
include('../modelo/conexion.php');
$Datos=Array(
    'nombre'=>$_POST['nombrep'],
    'descripcion'=>$_POST['descripcion'],
    'precio'=>$_POST['precio'],
    'cantidad'=>$_POST['cant'],
    'categoria'=>$_POST['categoria'],
    'des'=>$_POST['des'],
    'id'=>$_POST['id']
);

if ($objeto=new conexion()) {
    if ($objeto->actualizar_producto($Datos)) {
        echo 1;
    }
    else{
        echo 0;
    }
}
else{
    echo "Error de conexion";
}
?>