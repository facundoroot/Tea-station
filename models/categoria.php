<?php

// <!-- representa a los registros de la tabla categorias de la base de datos
// la representacion de cada uno de ellos seria el modelo
// este modelo sera un registro -->

class Categoria
{
    // vamos a definirle tantos atributos como campos en la tabla usuarios de nuestra DB
    // vamos a darle atributos privados para solo acceder a ellos a travez de metodos

    private $id;
    private $nombre;

    // las dos de arriba son las propiedades de la tabla, esta es nuestra para conectarnos y hacer querys a la DB
    private $db;
    // esto lo vamos a utilizar para crear ubjetos usuarios, ahora me armo los getter y setters

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        return $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getAll()
    {
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
        return $categorias;

    }

    public function save()
    {
        // voy a guardar todos los datos del objeto, en este caso la categoria en la base de datos
        // en el index importe la conexion de base de datos
        // me conecto con la base de datos
        $sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}')";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;

    }

}
