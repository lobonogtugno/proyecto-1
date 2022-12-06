<?php 
	   $total=$val['precio']-($val['precio']*($val['descuento']/100));

?>

<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
                                <?php
                                echo '<img src="'.$val["imagen"].'" alt="">';
                                ?>
								
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
                            <?php
                                echo '<img src="'.$val["imagen"].'" alt="">';
                                ?>
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $val["nombre"];?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#"></a>
							</div>
							<div>
								<h3 class="product-price">$<?php echo $total;?> <del class="product-old-price">$<?php echo $val["precio"];?></del></h3>
								<span class="product-available">Precio</span>
							</div>
							<p><?php echo $val["descripcion"];?></p>

							<div class="add-to-cart">
								<div class="qty-label">
									Cantidad
									<div class="input-number">
										<input id='totall' type="number" value=0>
										<span onclick="javascript:$('#totall').val(parseInt($('#totall').val())+1)"class="qty-up">+</span>
										<span onclick="javascript:$('#totall').val(parseInt($('#totall').val())-1)" class="qty-down">-</span>
									</div>
								</div>
								<button onclick='javascript:cargar_carrito(<?php echo $val["id"];?>,"<?php echo $val["imagen"];?>","<?php echo $val["nombre"];?>",<?php echo $total;?>);' class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Añadir al carrito </button>
							</div>



							<ul class="product-links">
								<li>Categoria:</li>
								<li><a href="#"><?php echo $val["nombre_categoria"];?></a></li>

							</ul>

							<ul class="product-links">
								<li>Siguinos:</li>
								<li><a href="https://www.facebook.com/noeberlin.aparicio?mibextid=LQQJ4d"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.google.com/search?q=10&sxsrf=ALiCzsZ_kFMP9sLyKiFzrdQ3PpxScairpg:1669501413080&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjM07a18cz7AhU7JEQIHfO3APgQ_AUoAXoECAMQAw&biw=1536&bih=714&dpr=1.25#imgrc=1sTiFPQlSEGJtM"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.youtube.com/watch?v=gkTb9GP9lVI&ab_channel=JwHDify"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="https://www.youtube.com/watch?v=gkTb9GP9lVI&ab_channel=JwHDify"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                            <br>
							<ul class="product-btns">
								<li><a href="javascript:cargar_data();"><i class="fa fa-exchange"></i> Seguir Comprando</a></li>
							</ul>
						</div>
					</div>
					<!-- /Product details -->
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
</div>

<script>
function cargar_carrito(id,img,nombre,precio) {
    let cantidad=$('#totall').val();
    if (cantidad!='' && cantidad>0 ) {
		console.log(id);
        $.ajax({
					url:'controlador/agregar_carrito.php',
					type:'POST',
					data:{
                        nombre:nombre,
                        precio:precio,
                        cantidad:cantidad,
                        id:id,
                        img:img
                    },
					success:function (msj) {
						$("#cmp").show();
						setTimeout(() => {
                            $("#cmp").hide();
                        }, 2000);
						$('#carritoo').html('');  
						$('#carritoo').html(msj);  
						console.log(msj);
					}
			});
    }
    else{
        alert('Necesitas agregar al menos 1 producto  :( ');
    }
}
function mas(val) {
	if (val==1) {
		
	} else {
		$('#totall').val()=$('#totall').val()-1
	}
}

</script>