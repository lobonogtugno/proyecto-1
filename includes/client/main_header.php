<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="javascript:cargar_data();" class="logo">
									<img src="./img/logi.jpg" style="width:80%;border-radius: 20%;" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
					
                        <div class="col-md-6">
								<div class="header-search">
									<form action='#' id='buscarp'>
										<select id='categ' name='categ' class="input-select">
											<option value="0">Todas</option>
											<option value="1">MEZCAL</option>
											<option value="2">COMPUESTOS</option>
											<option value="3">ARTESANIAS</option>
											<option value="4">BLUSAS</option>
										</select>
										<input id='busca' name='busca' class="input" placeholder="Buscar">
										<button type='submit' name='bsc' id='bsc' class="search-btn">Buscar</button>
									</form>
								</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<!--<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								 /Wishlist -->
								<!-- Cart -->
								<div id='carritoo' class="dropdown">
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
            </div>
            
<script>
$(document).ready(function () {
	$.ajax({
					url:'controlador/agregar_carrito.php',
					type:'POST',
					data:{},
					success:function (msj) {
						$('#carritoo').html('');  
						$('#carritoo').html(msj);  
					}
			});
});

function revisarpagar(t) {
	if (t!=0) {
			$.ajax({
					url:'controlador/revisarpagar.php',
					type:'POST',
					data:{},
					success:function (msj) {
						if (msj==0) {
							alert('No ha HECHO NINGUNA COMPRA');
						}  
						else{
							$('#cont').html('');
		  					$('#detalles').html(msj);  
						}
						
					}
			});
}
else{
	alert('No tiene ningun producto en la Cesta');
}
	}

function eliminarp(ide){
	$.ajax({
					url:'controlador/eliminar_carrito.php',
					type:'POST',
					data:{id:ide},
					success:function (msj) {
						if (msj==1) {
							$.ajax({
								url:'controlador/agregar_carrito.php',
								type:'POST',
								data:{},
								success:function (msj) {
									$('#carritoo').html('');  
									$('#carritoo').html(msj);  
								}
						});
						}
						else{alert(msj);}
					}
			});
}

</script>
