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
								<div id="tab1" class="tab-pane active">
								
									
										<!-- product -->
										<div id="cont">
								
								</div>
										<!-- /product -->
								</div>
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
<div id='detalles'>


</div>
<script src="js/slick.min.js"></script>

<script>
$(document).ready(function () {
	cargar_data();

});
function cargar_data(op=1) {
	$.ajax({
        url:'controlador/articulos_client.php',
        type:'POST',
		dataType:'html',
        data:{
			cargar:op
		},
        success:function (msj) {

			$('#cont').html(msj);   
			$('#detalles').html('');
			reload();
			reload_d();
        }
    }) 
}





$('#buscarp').submit(function (event) {
	event.preventDefault();
	if (($('#categ').val()!='') && ($('#busca').val()!='')) {
		let Dat=$(this).serialize();
			$.ajax({
					url:'controlador/buscar_producto_client.php',
					type:'POST',
					data:Dat,
					success:function (msj) {
						$('#cont').html(msj);  
						reload(); 
					}
			});
	}
	else{
		alert('Nesecitas ingresar datos para poder buscar  :) ');
	}
});
function pagar() {
	exr=new RegExp("^[A-Z a-z \_]{1}[A-Z a-z 0-9 \_ \.]+@[A-Z a-z 0-9 \_ \.]+[\.]{1}[A-Z a-z 0-9 \_ \.]+$");
	exr1=new RegExp("^[1-8]{1}[0-9]{1}$");

	band=true;
	var Url='';
	if ($('#first-name').val()=='') {
		$('#msj_error0').show();
		band=false;
	}else{$('#msj_error0').hide();}

	if (!exr.test($('#email').val())) {
        $('#msj_error1').show();
        band=false;
    }else{$('#msj_error1').hide();}

	if ($('#address').val()=='') {
		band=false;
		$('#msj_error2').show();
	}else{$('#msj_error2').hide();}

	if ($('#city').val()=='') {
		band=false;
		$('#msj_error3').show();
	}else{$('#msj_error3').hide();}

	if ($('#tel').val()=='') {
		band=false;
		$('#msj_error4').show();
	}else{$('#msj_error4').hide();}
	if (document.getElementById('rgs').getAttribute('opcion')=='1') {
		
		Url='controlador/registrar_pedir.php';
			if ($('#password').val()=='') {
			band=false;
			$('#msj_error5').show();
			}else{$('#msj_error5').hide();}

			if ($('#usuario').val()=='') {
			band=false;
			$('#msj_error7').show();
			}else{$('#msj_error7').hide();}

			if (!exr1.test($('#aa').val())) {
			band=false;
			$('#msj_error8').show();
			}else{$('#msj_error8').hide();}
	}else{
		console.log('solo');
		Url='controlador/pedir.php';
		$('#msj_error5').hide();
		$('#msj_error7').hide();
		$('#msj_error8').hide();
	}
	if (($('#payment-1').is(':checked')) || ( $('#payment-3').is(':checked'))) {
			$('#msj_error6').hide();
	}else{$('#msj_error6').show();band=false;}

	if (band) {
		let Data=new FormData($('#aprobar')[0]);
		
		$.ajax({
        data:Data,
        url:Url,
        type:'POST',
        contentType:false,
        processData:false,
        beforesend:function () {
            
        },
        success:function (response) {
            console.log(response);
            switch (response) {
                    case '1':
                        $("#aprobados").show();
                        $("#aprobadoe").hide();
                        setTimeout(() => {
							$("#aprobados").hide();
							window.location='index.php';
						}, 3000);
						
                        break;
                    default:
					$('#msjj').html('PUEDE QUE EL USUARIO NO ESTE DISPONIBLE');
                    $("#aprobados").hide();
					$("#aprobadoe").show();
                        setTimeout(() => {
                            $("#aprobadoe").hide();
                        }, 3000);
                    break;
                }
        }
    });
	}else{
		$('#msjj').html('VERIFIQUE SUS DATOS');
		$("#aprobadoe").show();
                        setTimeout(() => {
                            $("#aprobadoe").hide();
                        }, 2000);
	}

}
console.log(band);
</script>