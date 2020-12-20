<?php
// este es un modelo de la entidad del usuario, representa un regstro de la base de datos
// en el modelo tengo todos los campos definidos del usuario, los getter y setter, y funcionalidades del usuario
// vamos a mezclar modelo de entidad con modelo de consulta

class Usuario
{
    // vamos a usar private ya que de esta manera, estas propiedades solo los vamos a poder obtener info desde dentro de la clase
    // o podemos crear metodos que llamen a estas propiedades, esos metodos si se pueden llamar desde fuera de la clase o sus children o lo que sea
    // pero no mas que esa informacion de las propiedades que nosotros dejamos que salga a travez de la funcion va a ser disponible, de esta manera, solo voy a permitir hacer ciertas cosas con nuestras propiedades, solo lo que yo permita a travez de las funciones o trabajando internamente, nada mas
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $imagen;
    private $db;

    // recordar que el metodo construct se corre automaticamente cuando se crea el objeto
    public function __construct()
    {
        $this->db = Database::connect();
    }

    // ahora armo los getter y setter
    // me hago los getters y setters
    // poniendole real_escape_string a los datos del form registro
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNombre()
    {
        return $this->nombre;

    }
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }
    public function getApellidos()
    {
        return $this->apellidos;

    }
    public function setApellidos($apellidos)
    {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }
    public function getEmail()
    {
        return $this->email;

    }
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);
    }
    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);

    }
    public function setPassword($password)
    {
        $this->password = $password;

    }
    public function getRol()
    {
        return $this->rol;
    }
    public function setRol($rol)
    {
        $this->rol = $rol;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function save()
    {
        // voy a guardar todos los datos del objeto, en este caso el usuario en la base de datos
        // en el index importe la conexion de base de datos
        // me conecto con la base de datos
        $sql = "INSERT INTO usuarios VALUES(NULL,'{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user','{$this->getImagen()}')";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;

    }

    public function login()
    {
        $result = false;
        // traigo los valores que le di con los set desde el controller
        $email = $this->email;
        $password = $this->password;

        // comprobar si existe el usuario
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            // los datos del login con fetch me los vuelvo un objeto
            $usuario = $login->fetch_object();

            // verificar la password
            // password_verify busca si la contrasenia($password) coincide con algun hash ($usuario->password)

            $verify = password_verify($password, $usuario->password);

            if ($verify) {
                $result = $usuario;
            }
        }

        return $result;
    }
}
