<?php
session_start();

$band=true;
$id=isset($_POST['id'])?($_POST['id']):($band=false);
if ($id==-1) {
    $_SESSION['cart']=array();
    echo 1;
}
elseif(isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
    echo 1;
} else { 
    echo 'Error';
}
?>