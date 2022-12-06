<?php
include('../modelo/conexion.php');

  $almacen='';
    if ($objeto=new conexion()) {

        if ($consulta=$objeto->consulta_categoria()) {
            foreach ($consulta as $valor ) {
                $Datos = array(
                    'op' => $valor['id']
                  );
                  $almacen.='
                  <div id="tab'.$valor['id'].'" class="tab-pane active">
								<h3 class="title">'.strtoupper($valor['nombre_categoria']).'</h3>
									<div class="products-slick" data-nav="#slick-nav-1">
                  ';
                if ($consulta1=$objeto->consulta($Datos)) {
                    foreach ($consulta1 as $dat) {
                        $total=$dat['precio']-($dat['precio']*($dat['descuento']/100));
                        $almacen.='
                        <div class="product">
                        <div class="product-img">
                            <img src="'.$dat['imagen'].'" alt="">
                            <div class="product-label">
                                <span class="sale">-'.$dat['descuento'].'%</span>
                                <span class="new">NUEVO</span>
                            </div>
                        </div>
                        <div class="product-body">
                            
                            <h3 class="product-name"><a href="#">'.$dat['nombre'].'</a></h3>
                            <h4 class="product-price">$'.$total.' <del class="product-old-price">$'.$dat['precio'].'</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <div class="btn-group-sm">
                            <button class="add-to-cart-btn" onclick="javascript:comprar('.$dat['cantidad'].','.$dat['precio'].');"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                        ';

                    }

                }
                else{echo 'error al consultar los datos';}  
                $almacen.='									
                </div>
                <div id="slick-nav-1" class="products-slick-nav"></div>
                </div><br><br>';
            }
            echo $almacen;
        }
        else{
           // echo "eror de conexion";
        }
    }


?>



