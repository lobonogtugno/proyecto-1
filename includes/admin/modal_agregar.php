
<!-- Modal -->
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                <label id='pe' name='pe'></label>
                <label id='id' name='id'></label>
                        <h5 id='titulo' class="modal-title">Agregar Producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <form enctype='multipart/form-data' id='agregar_producto' method="post">
            <div class="modal-body">
                    <div id="error1" class="alert alert-danger fade in" style="display:none" >
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="sr-only">Cerrar</span>
                            </button>
                            <strong>Error</strong> No se han guardaron los datos
                        </div>
                        <div id="exi1" class="alert alert-success fade in" style="display:none" >
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span class="sr-only">Cerrar</span>
                            </button>
                            <strong>Gardado</strong> Se han guardaron los datos
                    </div>
                <div class="container-fluid">

                    <div class="form-group " id="categori"class="has-success" >
                        <label class="control-label" for="title">Categoria Producto</label>
                        <select class="form-control" name="categoria" id="categoria">
                            <option value="">seleccione una opcion</option>
                            <option value="1">MEZCAL</option>
                            <option value="2">COMPUESTOS</option>
                            <option value="3">ARTESANIAS</option>
                            <option value="4">BLUSAS</option>
                        </select>
                        <label id="msj_agregar_19" style="display:none;color:red">Campo vacio</label>
                            
                    </div>
                    <div class="form-group " id="nombrepp"class="has-success" >
                        <label class="control-label" for="title">Nombre Producto</label>
                        <input  type="text" class="form-control round-input" name="nombrep" id="nombrep">  
                        <label id="msj_agregar_21" style="display:none;color:red">Campo vacio</label>
                            
                    </div>
          
                    <div class="form-group " id="descr" class="has-success" >
                        <label class="control-label" for="title">Descripcion</label>
                        <textarea class="form-control round-input" name="descripcion" id="descripcion" ></textarea> 
                        <label id="msj_agregar_22" style="display:none;color:red">Campo vacio</label>
                            
                    </div>
                    <div class="form-group " id="precioo"class="has-success" >
                        <label class="control-label" for="title">Precio</label>
                        <input  type="number" class="form-control round-input" name="precio" id="precio">  
                        <label id="msj_agregar_23" style="display:none;color:red">Campo vacio</label>
                            
                    </div>
          
                    <div class="form-group " id="canti" class="has-success" >
                        <label class="control-label" for="title">Cantidad</label>
                        <input  type="number" class="form-control round-input" name="cant" id="cant">  
                        <label id="msj_agregar_24" style="display:none;color:red">Campo vacio</label>   
                    </div>
                    <div class="form-group " id="dess" class="has-success" >
                        <label class="control-label" for="title">Descuento en % (10%)</label>
                        <input  type="number" class="form-control round-input" name="des" id="des">  
                        <label id="msj_agregar_26" style="display:none;color:red">Campo vacio</label>   
                    </div>
                    <div class="form-group " id="filee" class="has-success" >
                        <label class="control-label" for="title">Imagen</label>
                        <input  type="file" class="form-control round-input" name="file" id="file">  
                        <label id="msj_agregar_25" style="display:none;color:red">Campo vacio</label>   
                    </div>
                
               
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                <button id='agregar' type="button" class="btn btn-primary">Guardar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
$('#agregar').click(function () {
    band=true;
    if ($('#categoria').val()=='') {
        $('#msj_agregar_19').show();
        band=false;
    }
    else{
        $('#msj_agregar_19').hide();
       // band=true;
    }
    if ($('#nombrep').val()=='') {
        $('#msj_agregar_21').show();
        band=false;
    }
    else{
        $('#msj_agregar_21').hide();
      //  band=true;
    }
    if ($('#descripcion').val()=='') {
        $('#msj_agregar_22').show();
        band=false;
    }
    else{
        $('#msj_agregar_22').hide();
       // band=true;
    }
    if ($('#precio').val()=='' || $('#precio').val()<1) {
        $('#msj_agregar_23').show();
        band=false;
    }
    else{
        $('#msj_agregar_23').hide();
        //band=true;
    }
    if ($('#cant').val()=='' || $('#cant').val()<1 ) {
        $('#msj_agregar_24').show();
        band=false;
    }
    else{
        $('#msj_agregar_24').hide();
       // band=true;
    }
    if ($('#des').val()==''|| $('#des').val()<1) {
        $('#msj_agregar_26').show();
        band=false;
    }
    else{
        $('#msj_agregar_26').hide();
       // band=true;
    }
    var Url='';
    if ($('#pe').val()==2) {
        Url='controlador/actualizar_producto.php';
    }
    else{Url='controlador/agregar_producto.php';
        if ($('#file').val()=='') {
                $('#msj_agregar_25').show();
                band=false;
            }
            else{
                $('#msj_agregar_25').hide();
                //band=true;
            }
    }

if (band) {
    let Data=new FormData($('#agregar_producto')[0]);
    Data.append('id',$('#id').val());
    console.log($('#id').val());
    $.ajax({
        data:Data,
        url:Url,
        type:'POST',
        contentType:false,
        processData:false,
        beforesend:function () {
            
        },
        success:function (response) {
            //band=true;
            console.log(response);
            switch (response) {
                    case '1':
                        $("#exi1").show();
                        $("#error1").hide();
                        setTimeout(() => {
                            $("#exi1").hide();
                        }, 1000);
                        setTimeout(() => {
                            $("#nuevo").modal('hide');
                        }, 2000);
                        break;
                    default:
                    $("#exi1").hide();
                    $("#error1").show();
                    break;
                }
        }
    });

}
});
$('#nuevo').on('hidden.bs.modal',function (event) {
        $("#error1").hide();
        $("#exi1").hide();
      
        $(this).find('input,select,text').each(function () {
            this.value=this.defaultValue;
            console.log(this.value);
        });
      
    });
$('#nuevo').on('show.bs.modal', function (event) {
     let button=$(event.relatedTarget);
     let modal=$(this);
     modal.find('#pe').val(button.data('opp'));
     console.log('sdfasdf');
     if ($('#pe').val()==2) {
        $("#filee").hide();
        document.getElementById('titulo').innerHTML='Actualizar Producto';
        modal.find('#categoria').val(button.data('cat'));
        modal.find('#nombrep').val(button.data('nom'));
        modal.find('#descripcion').val(button.data('des'));
        modal.find('#precio').val(button.data('pre'));
        modal.find('#cant').val(button.data('can'));
        modal.find('#des').val(button.data('desc'));
        modal.find('#id').val(button.data('id'));
     }
     else{
        $("#filee").show();
        document.getElementById('titulo').innerHTML='Agregar Producto';

        //document.getElementById('filee').setAttribute('disabled',true);
     }
     

     
 });
</script>