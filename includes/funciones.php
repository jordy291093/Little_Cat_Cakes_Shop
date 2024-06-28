<?php

define('TEMPLATES_URL', __DIR__.'/templates');
define('FUNCIONES_URL', __DIR__.'funciones.php');
define('CARPETA_PRODUCTO', __DIR__.'/../imagenes/producto/');
define('CARPETA_CLIENTES', __DIR__.'/../imagenes/clientes/');
define('CARPETA_GALERIA', __DIR__.'/../imagenes/galeria/');
define('CARPETA_TEMPORADA', __DIR__.'/../imagenes/temporada/');

function incluirTemplate(string $nombre) {
    include TEMPLATES_URL."/{$nombre}.php";
}

function autenticado() {
    session_start();

    if(!$_SESSION['login']) {
        header('Location: /');
    }
}

function debug($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html): string {
    $s = htmlspecialchars($html);
    return $s;
}

function notificacionExito($codigo) {
    $mensaje = '';

    switch ($codigo) {
        case 1:
            $mensaje = 'Creado Correctamente';
        break;

        case 2:
            $mensaje = 'Actualizado Correctamente';
        break;

        default:
            $mensaje = false;
        break;
    }

    return $mensaje;
}