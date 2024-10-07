<?php

require_once __DIR__ . '/../src/entity/exceptions/fileException.php';
require_once __DIR__ . '/../src/utils/file.php';
require_once __DIR__ . '/../src/entity/imagen.class.php'; 


$errores=[]; 
$titulo=""; 
$descripcion=""; 
$mensaje="";

If ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
    try {
    $titulo = trim(htmlspecialchars($_POST['titulo']));
    $descripcion = trim(htmlspecialchars($_POST['descripcion']));
    $tiposAceptados = ['image/jpeg', 'image/gif', 'image/png'];
    $imagen = new File('imagen', $tiposAceptados);
    $imagen->saveUploadFile(Imagen::RUTA_IMAGENES_SUBIDAS );
    $mensaje = "Datos enviados";
    } catch (FileException $fileException) {
        $errores[] = $fileException->getMessage();
    }
   
}

require_once __DIR__ . '/views/galeria.view.php';