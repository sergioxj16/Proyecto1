<?php

namespace src\entity;

class Imagen
{
    // Atributos privados
    private int $id;
    private string $nombre;
    private string $descripcion;
    private string $categoria;
    private int $numVisualizaciones;
    private int $numLikes;
    private int $numDownloads;

    // Constantes de rutas de imágenes
    const RUTA_IMAGENES_PORTFOLIO = '/public/images/index/portfolio/';
    const RUTA_IMAGENES_GALERIA = '/public/images/index/gallery/';
    const RUTA_IMAGENES_CLIENTES = '/public/images/clients/';

    // Constructor
    public function __construct(string $nombre, string $descripcion, string $categoria, int $numVisualizaciones = 0, int $numLikes = 0, int $numDownloads = 0)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->categoria = $categoria;
        $this->numVisualizaciones = $numVisualizaciones;
        $this->numLikes = $numLikes;
        $this->numDownloads = $numDownloads;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function getNumVisualizaciones(): int
    {
        return $this->numVisualizaciones;
    }

    public function getNumLikes(): int
    {
        return $this->numLikes;
    }

    public function getNumDownloads(): int
    {
        return $this->numDownloads;
    }

    // Setters con retorno de la clase
    public function setNombre(string $nombre): Imagen
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function setDescripcion(string $descripcion): Imagen
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function setCategoria(string $categoria): Imagen
    {
        $this->categoria = $categoria;
        return $this;
    }

    public function setNumVisualizaciones(int $numVisualizaciones): Imagen
    {
        $this->numVisualizaciones = $numVisualizaciones;
        return $this;
    }

    public function setNumLikes(int $numLikes): Imagen
    {
        $this->numLikes = $numLikes;
        return $this;
    }

    public function setNumDownloads(int $numDownloads): Imagen
    {
        $this->numDownloads = $numDownloads;
        return $this;
    }

    // Método _toString
    public function __toString(): string
    {
        return $this->descripcion;
    }

    // Métodos para obtener las URLs
    public function getUrlPortfolio(): string
    {
        return self::RUTA_IMAGENES_PORTFOLIO . $this->getNombre();
    }

    public function getUrlGaleria(): string
    {
        return self::RUTA_IMAGENES_GALERIA . $this->getNombre();
    }

    public function getUrlClientes(): string
    {
        return self::RUTA_IMAGENES_CLIENTES . $this->getNombre();
    }
}
?>