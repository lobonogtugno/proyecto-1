<?php
include('../modelo/conexion.php');
$Datos=Array(
    'id'=>$_POST['ide']
);

if ($objeto=new conexion()) {
    if ($consulta=$objeto->busca($Datos)) {
        $Dir=explode('/',$consulta['imagen']);
        if ($objeto->rmdir_recursive('../'.$Dir[0].'/'.$Dir[1])&&$objeto->eliminar_producto($Datos)) {
            
                echo 1;
             
        }
    }

}
else{
    echo "eror de conexion";
}
?>