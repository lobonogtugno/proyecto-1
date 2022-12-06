<?php
include('modal_agregar.php');
?>
	<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
									<li><a id='barro'  href="javascript:cargar_data();">MEZCAL</a></li>
									<li><a id='palma' href="javascript:cargar_data(2);">COMPUESTOS</a></li>
									<li><a id='piedras'  href="javascript:cargar_data(3);">ARTESANIAS</a></li>
									<li><a id='cuero'  href="javascript:cargar_data(4);">BLUSAS</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
	</nav>

<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
	
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<button type='button' data-opp=1 class='btn btn-primary' data-toggle="modal" data-target="#nuevo">Agregar Nuevo Producto</button>
		
								<div id="tab1" class="tab-pane active">
			
									
										<!-- product -->
										<div id="cont">
								
										</div>
										<!-- /product -->							
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<script src="js/slick.min.js"></script>
<script>
$(document).ready(function () {
	cargar_data();
	
});
function cargar_data(op=1) {
	$.ajax({
        url:'controlador/cargar_articulos.php',
        type:'POST',
		dataType:'html',
        data:{
			cargar:op
		},
        success:function (msj) {

		  $('#cont').html(msj);   
		  reload();   
        }
    }) 
}





$('#buscarp').submit(function (event) {
	event.preventDefault();
	//if (($('#categ').val()!='') && ($('#busca').val()!='')) {
		let Dat=$(this).serialize();
			$.ajax({
					url:'controlador/buscar_producto.php',
					type:'POST',
					data:Dat,
					success:function (msj) {
						$('#cont').html(msj);  
						reload(); 
					}
			});
	//}
	/*else{
		alert('nesecita ingresar datos para poder buscar');
	}*/
});

</script>