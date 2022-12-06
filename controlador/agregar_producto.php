<?php
include('../modelo/conexion.php');

//$File=$_FILES['file']['tmp_name']=$_POST['nombrep'];
    $punto=strpos($_FILES['file']['name'], '.');
    $uno;
    $extencion;
    if ($punto) {
        list($uno, $extencion) = explode(".", ($_FILES['file']['name']));
    }else{$uno=$_FILES['file']['name'];}

$ruta='../images/'.$_POST['nombrep'].'/';
$ruta1='images/'.$_POST['nombrep'].'/';
CrearCarpetas($ruta);
$ruta.=$_POST['nombrep'].'.'.$extencion;
$ruta1.=$_POST['nombrep'].'.'.$extencion;
move_uploaded_file($_FILES['file']['tmp_name'],$ruta);

$Datos=Array(
    'op'=>1,
    'nombre'=>$_POST['nombrep'],
    'descripcion'=>$_POST['descripcion'],
    'precio'=>$_POST['precio'],
    'cantidad'=>$_POST['cant'],
    'categoria'=>$_POST['categoria'],
    'imagen'=>$ruta1,
    'des'=>$_POST['des']
);
if ($objeto=new conexion()) {
    if ($objeto->agregar_producto($Datos)) {
        echo 1;
    }
    else{
        echo 0;
    }
}
else{
    echo "eror de conexion";
}




function CrearCarpetas($directorio){
    if (!file_exists(($directorio))) {
        mkdir($directorio, 0777, true);
    }
    return true;
}
?>