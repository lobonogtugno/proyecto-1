<?php
include('../modelo/conexion.php');
session_start();
if (isset($_POST['address'])&&
    isset($_POST['city'])&&
    isset($_POST['tel'])&&
    isset($_POST['first-name'])) {

     if ($objeto=new conexion()) {
                $Datos=Array(
                    'nombre'=>$_POST['first-name'],
                    'address'=>$_POST['address'],
                    'city'=>$_POST['city'],
                    'tel'=>$_POST['tel'],
                    'id'=>$_SESSION['ide']
                );
                if ($objeto->registrar_venta($Datos)) {
                    $objeto->cerrar();
                    $_SESSION['cart'] = array();
                    echo 1;
                } 
     }
     else{
         echo "eror de conexion";
     }
}

?>