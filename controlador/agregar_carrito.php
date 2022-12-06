<?php
session_start();

$band=true;
$id=isset($_POST['id'])?($_POST['id']):($band=false);
$Producto=array(
    'nombre'=>isset($_POST['nombre'])?($_POST['nombre']):($band=false),
    'total'=>isset($_POST['precio'])&&isset($_POST['cantidad'])?($_POST['precio']*$_POST['cantidad']):($band=false),
    'cant'=>isset($_POST['cantidad'])?($_POST['cantidad']):($band=false),
    'precio'=>isset($_POST['precio'])?($_POST['precio']):($band=false),
    'id'=>isset($_POST['id'])?($_POST['id']):($band=false),
    'img'=>isset($_POST['img'])?($_POST['img']):($band=false)
);


    if (isset($_SESSION['cart'])) {
        if ($band) {
            if(isset($_SESSION['cart'][$id])== $id) {
                $_SESSION['cart'][$id]['total']+=$_POST['precio']*$_POST['cantidad'];
                $_SESSION['cart'][$id]['cant']+=$_POST['cantidad'];
            } else { 
                //if not same put new storing
                $_SESSION['cart'][$id] = $Producto;
            }
        }
    }
    else  {
        $_SESSION['cart'] = array();
        if ($band)$_SESSION['cart'][$id] = $Producto;
        
    }


    $cuenta_total=0;
    $mensaje='
    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-shopping-cart"></i>
        <span>Carrito</span>
        <div class="qty">'.sizeof($_SESSION['cart']).'</div>
    </a>
    <div class="cart-dropdown">
        <div class="cart-list">
    ';
    foreach ($_SESSION['cart'] as $value) {
       
            $cuenta_total+=$value["total"];
            $mensaje.='
            <div class="product-widget">
            <div class="product-img">
                <img src="'.$value["img"].'" alt="">
            </div>
            <div class="product-body">
                <h3 class="product-name"><a href="#">'.$value["nombre"].'</a></h3>
                <h4 class="product-price"><span class="qty">'.$value["cant"].' x</span>$'.$value["precio"].'</h4>
            </div>
            <button onclick="javascript:eliminarp('.$value['id'].');" class="delete"><i class="fa fa-close"></i></button>
        </div>
            ';
        
    }
    $mensaje.='
    </div>
    <div class="cart-summary">
        <small>'.sizeof($_SESSION['cart']).' producto(s) seleccionados</small>
        <h5>SUBTOTAL: $'.$cuenta_total.'</h5>
    </div>
    <div class="cart-btns">
        <a href="javascript:eliminarp(-1);">Vaciar Carrito</a>
        <a href="javascript:revisarpagar('.sizeof($_SESSION['cart']).')">Revisar y Pagar<i class="fa fa-arrow-circle-right"></i></a>
    </div>
    </div>

    ';
echo $mensaje;



?>




	
		