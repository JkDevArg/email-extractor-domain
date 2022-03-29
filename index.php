<?php

    include 'datos.php';
    include 'getdominios.php';
    //generamos un correo y un correo representante
    $datos = new insertarDatos();
    $datos->generarDatos();
    //obtenemos el dominio de los correos
    $dominios = new Dominios();
    $dominios->dominios();


?>
