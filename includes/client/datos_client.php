
<?php
$contador=0;
if (isset($consulta) && $consulta!=null) {
$contenedor='<div class="products-slick" data-nav="#slick-nav-1">';
   foreach ($consulta as $value) {
	   $total=$value['precio']-($value['precio']*($value['descuento']/100));
       $contenedor.='
                                        <div class="product" onclick="javascript:detalles('.$value['id'].');">
											<div class="product-img">
												<img style="position:relative;height:200px; width:200px;justify-content:center;" src="'.$value['imagen'].'" alt="">
												<div class="product-label">
													<span class="sale">-'.$value['descuento'].'%</span>
													<span class="new">NUEVO</span>
												</div>
											</div>
											<div class="product-body">
												
												<h3 class="product-name"><a href="javascript:detalles('.$value['id'].');">'.$value['nombre'].'</a></h3>
												<h4 class="product-price">$'.$total.' <del class="product-old-price">$'.$value['precio'].'</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Añadir al Carrito</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Comprar</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Vista Rapida</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<div class="btn-group-sm">
												<button class="add-to-cart-btn" onclick="javascript:detalles('.$value['id'].');"><i class="fa fa-shopping-cart"></i>Añadir al Carrito</button>
												</div>
											</div>
										</div>
	   ';
	   $contador++;
	   if ($contador>2) {
		$contenedor.='</div>
		<div id="slick-nav-1" class="products-slick-nav"></div>
		</div>
		<br>
		<br>
		<br>
		
		<div id="tab1" class="tab-pane active">
		<div class="products-slick" data-nav="#slick-nav-1">
	 ';
	 $contador=0;
	   }
   }
   echo $contenedor.'</div>
   <div id="slick-nav-1" class="products-slick-nav"></div>
';
 
}

?>

<script>

function detalles(id) {
	console.log(id);
	$.ajax({
        url:'controlador/detalles_producto.php',
        type:'POST',
		dataType:'html',
        data:{
			id:id
		},
        success:function (msj) {
		$('#cont').html('');
		  $('#detalles').html(msj);   
		 // reload_d();   
        }
    }) 
}

</script>