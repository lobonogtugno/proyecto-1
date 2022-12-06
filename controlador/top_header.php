<?php
if (!isset($_SESSION)) {
    session_start();
  }
if (isset($_SESSION['usuario']) && ($_SESSION['usuario']!='') && 
isset($_SESSION['ide']) &&($_SESSION['ide']!='') && 
isset($_SESSION['acceso'])
) {
    echo '     
    <div id="top-header">
    <div class="container">
        <ul class="header-links pull-left">
            <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i>'.$_SESSION['correo'].'</a></li>
            <li><a href="#"><i class="fa fa-map-marker"></i> '.$_SESSION['nombre'].'</a></li>
        </ul>
        <ul class="header-links pull-right">
            <li><a href="controlador/logout.php"><i class="fa fa-sign-out"></i> Cerrar Session</a></li>
            <li><a href="#"><i class="fa fa-user-o"></i>'.$_SESSION['usuario'].'</a></li>
        </ul>
    </div>
</div>
';

}
else{
 echo '
 <div id="top-header">
 <div class="container">
     <ul class="header-links pull-left">
     </ul>
     <ul class="header-links pull-right">
         <li><a href="#" data-toggle="modal" data-target="#iniciar_seccion"><i class="fa fa-sign-in"></i> Iniciar Session</a></li>
         <li><a href="#" data-toggle="modal" data-target="#registrarse"><i class="fa fa-registered"></i> Registrarse</a></li>
     </ul>
 </div>
</div>
 
 ';

}

    include("../includes/modales.php");
       

?>
