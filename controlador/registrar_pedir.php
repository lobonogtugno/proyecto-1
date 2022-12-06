<?php
include('../modelo/conexion.php');
session_start();
if (isset($_POST['first-name'])&&
    isset($_POST['aa'])&&
    isset($_POST['email'])&&
    isset($_POST['usuario'])&&
    isset($_POST['password'])) {
        $Datos=Array(
            'nombre'=>$_POST['first-name'],
            'edad'=>$_POST['aa'],
            'correo'=>$_POST['email'],
            'user'=>$_POST['usuario'],
            'pass'=>$_POST['password']
        );
     if ($objeto=new conexion()) {
         if ($objeto->registrar_usuario($Datos)) {
                $dat=$objeto->busca_usuario($Datos);

                $Datos=Array(
                    'nombre'=>$_POST['first-name'],
                    'correo'=>$_POST['email'],
                    'address'=>$_POST['address'],
                    'city'=>$_POST['city'],
                    'tel'=>$_POST['tel'],
                    'id'=>$dat['id']
                );
                if ($objeto->registrar_venta($Datos)) {
                    $objeto->cerrar();
                    $_SESSION['cart'] = array();
                    echo 1;
                }
            
         }
         else{
             echo 0;
         }
     }
     else{
         echo "eror de conexion";
     }
}

?>