<!-- creamos la conexion a la base de datos -->
<?php

class Database
{
    public static function connect()
    {
        $db = new mysqli('localhost', 'root', '', 'tienda_master');
        // hago una consulta para el castellano
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}