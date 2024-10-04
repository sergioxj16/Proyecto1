<?php
require_once __DIR__ . '/../src/entity/imagen.class.php';

$imagenesHome = [];
for ($i = 1; $i <= 12; $i++) {
    $imagenesHome[] = new Imagen("$i.jpg", "Descripción de la imagen $i", 1, 2, 3, 4);
}

require_once __DIR__ . '/views/index.view.php';