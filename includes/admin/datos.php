
<?php
$almacen='';
if (isset($consulta) && $consulta!=null) {
	echo '							
	<div class="products-slick" data-nav="#slick-nav-1">
';
   foreach ($consulta as $value) {
	   $total=$value['precio']-($value['precio']*($value['descuento']/100));
       echo '
                                        <div class="product">
											<div class="product-img">
												<img style="position:relative;height:200px; width:200px;justify-content: center;" src="'.$value['imagen'].'" alt="">
												<div class="product-label">
													<span class="sale">-'.$value['descuento'].'%</span>
													<span class="new">NUEVO</span>
												</div>
											</div>
											<div class="product-body">
												
												<h3 class="product-name"><a href="#">'.$value['nombre'].'</a></h3>
												<h4 class="product-price">$'.$total.' <del class="product-old-price">$'.$value['precio'].'</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>



												




											</div>
											<div class="add-to-cart">
												<div class="btn-group-sm">
												';?>
 											<button data-opp=2 data-toggle="modal" data-target="#nuevo"
											 data-id='<?php echo $value['id'] ?>'
											 data-cat='<?php echo $value['categoria'] ?>'
											 data-nom='<?php echo $value['nombre'] ?>'
											 data-des='<?php echo $value['descripcion'] ?>'
											 data-pre='<?php echo $value['precio'] ?>'
											 data-can='<?php echo $value['cantidad'] ?>'
											 data-desc='<?php echo $value['descuento'] ?>'
											 class="btn btn-success"> Modificar</button>
											<button data-toggle='modal' data-target='#eliminar' data-id='<?php echo $value['id'] ?>' class="btn btn-danger"> Eliminar</button>
											<?php	
												 echo '
												</div>
											</div>
										</div>
       ';
   }
   echo '</div>
   <div id="slick-nav-1" class="products-slick-nav"></div>';
}

?>

<!--<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp"></span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp"></span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp"></span></button>
												</div>