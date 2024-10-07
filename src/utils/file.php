<?php
require_once __DIR__ . '/../../src/entity/exceptions/fileException.php';

class File
{
    private $file; // Contenido del fichero que se sube al servidor
    private $fileName; // Nombre del fichero

    // Se pasa el nombre del fichero y una lista con los tipos de archivos que acepta la clase.
    public function __construct(string $fileName, array $arrTypes)
    {
        $this->file = $_FILES[$fileName]; // $_FILES guarda los datos que se envían en forma de fichero
        $this->fileName = '';

        // Comprobar si ya existe el fichero
        if (!isset($this->file)) {
            throw new FileException('Debes seleccionar un fichero');
        }

        // Comprobar si se ha producido algún error en la subida
        if ($this->file['error'] !== UPLOAD_ERR_OK) {
            switch ($this->file['error']) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    // Error de tamaño
                    throw new FileException('El fichero es demasiado grande');

                case UPLOAD_ERR_PARTIAL:
                    // Error de archivo incompleto
                    throw new FileException('No se ha podido subir el fichero completo');

                default:
                    // Error en la subida
                    throw new FileException('No se ha podido subir el fichero');
            }
        }

        // Comprobar si los archivos pasados son de un tipo admitido
        if (in_array($this->file['type'], $arrTypes) === false) {
            throw new FileException('Tipo de fichero no soportado');
        }
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $rutaDestino
     * @return void
     * @throws FileException
     */
    public function saveUploadFile(string $rutaDestino)
    {
    // Primero hay que comprobar que el fichero se ha subido desde el formulario.
    // Hay un tipo de ataques que intenta acceder a archivos del SO
    if (is_uploaded_file($this->file['tmp_name']) === false)
    throw new FileException('El archivo no ha sido subido mediante un formulario.');
    $this->fileName = $this->file['name'];
    $ruta = $rutaDestino . $this->fileName;
    // Comprobamos si ya existe el fichero
    if (is_file($ruta) === true) {
    // Generamos un nombre aleatorio
    $idUnico = time();
    $this->fileName = $idUnico . "_" . $this->fileName;
    $ruta = $rutaDestino . $this->fileName;
    }
    if (move_uploaded_file($this->file['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/'.$ruta) === false)
    throw new FileException('No se puede mover el archivo a su destino');
    }
}