<?php
class utils{
    public static function esOpcionMenuActiva($opcion): bool
    {
        $actual = explode('/',$_SERVER['REQUEST_URI']);
        $actual = '/'.$actual[count($actual)-1];
        if ( $actual === $opcion) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>



