<?php
require_once __DIR__ . '/../src/entity/imagen.class.php';

$imagenesClientes = [];
$imagenesClientes[] = new Imagen('client1.jpg', 'MISS BELLA');
$imagenesClientes[] = new Imagen('client2.jpg', 'DON PENO');
$imagenesClientes[] = new Imagen('client3.jpg', 'SWEETY');
$imagenesClientes[] = new Imagen('client4.jpg', 'LADY');

require_once __DIR__ . '/views/about.view.php';