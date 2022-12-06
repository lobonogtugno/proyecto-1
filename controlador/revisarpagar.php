<?php
session_start();

    if (isset($_SESSION['cart'])) {
        $contenedor='
        <div class="section">
                <div id="aprobadoe" class="alert alert-danger fade in" style="display:none" >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="sr-only">Close</span>
                    </button>
                    <strong id="msjj"></strong> 
                </div>
                <div id="aprobados" class="alert alert-success fade in" style="display:none" >
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>SU PEDIDO SE HA COMPLETADO</strong> GRACIAS POR SU PREFERENCIA
                </div>
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
        ';
        if ((isset($_SESSION['usuario']) && ($_SESSION['usuario']!=''))) {
            $contenedor.='
            <div class="col-md-7">
            <!-- Billing Details -->
            <form  id="aprobar" method="post">
            <div class="billing-details">
                <div class="section-title">
                    <h3 class="title">Datos Para Facturacion</h3>
                    <label id="rgs" name="rgs" opcion=0></label>
                    
                </div>
                <div class="form-group">
                    <input value="'.$_SESSION['nombre'].'" class="input" type="text" id="first-name" name="first-name" placeholder="First Name">
                    <label id="msj_error0" style="display:none;color:red">Campo vacio</label>
                </div>
                <div class="form-group">
                    <input value="'.$_SESSION['correo'].'" class="input" type="email" id="email" name="email" placeholder="Email">
                    <label id="msj_error1" style="display:none;color:red">Campo vacio</label>
                </div>
                <div class="form-group">
                    <input class="input" type="text" name="address" id="address" placeholder="Direccion">
                    <label id="msj_error2" style="display:none;color:red">Campo vacio</label>
                </div>
                <div class="form-group">

                    <select class="form-control" name="city" id="city">
                                          <option value="Tlaxiaco">Tlaxiaco</option>
                                          <option value="Putla">Putla</option>
                                          <option value="Huajuapan">Huajuapan</option>
                    </select>
                    <label id="msj_error3" style="display:none;color:red">Campo vacio</label>
                </div>
                
                <div class="form-group">
                    <input class="input form-control" type="number" name="tel" id="tel" placeholder="Telefono">
                    <label id="msj_error4" style="display:none;color:red">Campo vacio</label>
                </div>
            </div>
            </form>
        </div>';
        }else{
            $contenedor.='
            <div class="col-md-7">
            <!-- Billing Details -->
            <form  id="aprobar" method="post">

            <div class="billing-details">
                <div class="section-title">
                    <h3 class="title">Datos Para Facturacion</h3>
                    <label id="rgs" name="rgs" opcion=1></label>
                    
                    <label for="create-account">
                    <span></span>
                    Para poder comprar necesita crear una cuenta si ya la tiene inicie session y compre
                </label>
                </div>
                <div class="form-group">
                    <input  class="input" type="text" id="first-name" name="first-name" placeholder="Nombre Completo">
                    <label id="msj_error0" style="display:none;color:red">Campo vacio</label>
                </div>
                <div class="form-group">
                    <input  class="input" type="email" id="email" name="email" placeholder="Email">
                    <label id="msj_error1" style="display:none;color:red">Campo vacio</label>
                </div>
                <div class="form-group">
                    <input class="input" type="text" name="address" id="address" placeholder="Direccion">
                    <label id="msj_error2" style="display:none;color:red">Campo vacio</label>
                </div>
                <div class="form-group">
                <select class="form-control" name="city" id="city">
                                <option value="Tlaxiaco">Tlaxiaco</option>
                                <option value="Putla">Putla</option>
                                <option value="Huajuapan">Huajuapan</option>
                </select>
                    <label id="msj_error3" style="display:none;color:red">Campo vacio</label>
                </div>
                <div class="form-group">
                    <input class="input form-control" type="number" name="tel" id="tel" placeholder="Telefono">
                    <label id="msj_error4" style="display:none;color:red">Campo vacio</label>
                </div>

                <label for="create-account">
                            <span></span>
                            si no tiene cuenta rellene los campos para conseguir una
                        </label>

                <div class="form-group">
                <input class="input" type="text" id="usuario" name="usuario" placeholder="Usuario">
                <label id="msj_error7" style="display:none;color:red">Campo vacio</label>
                </div>
                <div class="form-group">
                <input class="input" type="password" id="password" name="password" placeholder="Contraseña">
                <label id="msj_error5" style="display:none;color:red">Campo vacio</label>
                </div>
                <div class="form-group">
                <input value=0 class="input" type="number" id="aa" name="aa" placeholder="Edad">
                <label id="msj_error8" style="display:none;color:red">Campo vacio</label>
                </div>
            </div>
            </form>
        </div>';

        }
        $contenedor.='
        <div class="col-md-5 order-details">
        <div class="section-title text-center">
            <h3 class="title">SU ORDEN</h3>
        </div>
        <div class="order-summary">
            <div class="order-col">
                <div><strong>PRODUCTO</strong></div>
                <div><strong>TOTAL</strong></div>
            </div>
            <div class="order-products">
        ';
        $cuenta_total=0;
                foreach ($_SESSION['cart'] as $value) {
            
                    $cuenta_total+=$value["total"];
                    $contenedor.='
                        <div class="order-col">
                            <div>'.$value["cant"].'x '.$value["nombre"].'</div>
                            <div>$'.$value["total"].'.00</div>
                        </div>
                    ';
                
            }
        $contenedor.='
            </div>
            <div class="order-col">
            <div>Envio</div>
            <div><strong>Gratis</strong></div>
        </div>
        <div class="order-col">
            <div><strong>TOTAL</strong></div>
            <div><strong class="order-total">$'.$cuenta_total.'.00</strong></div>
        </div>
        <div class="payment-method">
        <label id="msj_error6" style="display:none;color:red">Seleccione Metodo de pago</label>

        <div class="input-radio">
            <input type="radio" name="payment" id="payment-1">
            <label for="payment-1">
                <span></span>
                TRANSFERENCIA BANCARIA
            </label>
            <div class="caption">
                <p>Tendra que ir a un banco a pagar el total para enviarle su(s) productos</p>
            </div>
        </div>
        <div class="input-radio">
            <input type="radio" name="payment" id="payment-3">
            <label for="payment-3">
                <span></span>
                PAYPAL 
            </label>
            <div class="caption">
                <p>Le Pedira que ingrese su Cuenta de Paypal para poder cobrarle</p>
            </div>
        </div>
    </div>

    <a href="javascript:pagar();" class="primary-btn order-submit">Realizar Pedido</a>
</div>
        ';

        $contenedor.='
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        ';
   echo $contenedor;
    }
    else  {
        echo 0;
        
    }


?>