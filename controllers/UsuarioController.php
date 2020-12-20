<?php

require_once 'models/usuario.php';
class usuarioController
{
    public function index()
    {
        echo "Controlador Usuarios,Accion Index";
    }

    public function registro()
    {
        require_once 'views/usuario/registro.php';
    }

    public function save()
    {
        // aca me va a llegar la info por metodo post, del usuario cuando llena el form del trgistro en views/usuario/registro.php
        if (isset($_POST)) {

            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if ($nombre && $apellidos && $email && $password) {
                $usuario = new Usuario;
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                // ahora los guardo en la tabla, recordar que el save que llamo ahora esta dentro de models
                $save = $usuario->save();

                // en vez de usar directamente echos para poner si fallo o se completo el registro voy a armar sesiones con la informacion
                // de esta manera me queda como si fuera una "variable" y llamo a esa variable y dependiendo del valor, ahi escribo el echo
                // de esta manera queda todo mucho mas organizado y prolijo
                // en este caso voy a llamar directo en la view del registro a estas sesiones para ver si pongo que fracaso o no el registro
                // recordar iniciar sesion en el index
                if ($save) {
                    $_SESSION['register'] = "complete";
                } else {
                    $_SESSION['register'] = "failed";
                }
            } else {
                $_SESSION['register'] = "failed";

            }
        } else {
            $_SESSION['register'] = "failed";

        }
        header('Location:' . base_url . 'usuario/registro');

    }

    public function login()
    {
        if (isset($_POST)) {
            // identifico al usuario
            // consulta a la base de datos
            $usuario = new Usuario();

            // recordar que con los set hice cifrar el codigo asi que cuando mire el modelo
            // cuando hago la verificacion, primero creo un objeto usuario el cual le paso el email y password que viene del form del login
            // o sea que el password lo tengo limpio de como lo puso el usuario
            // luego miro en la base de datos el registro que coincide con el email que submitio el usuario y saco toda la fila de info de ese registro y lo transformo en un objeto con fecth_object
            // por ultimo utilizare password_hash que por un lado le meto la contrasenia limpia y por el otro la contrasenia ya hasheada de la base de datos
            // luego el algoritmo mira si al hashear la contrasenia limpia coincide con la de la base de datos
            //
            // luego del lado del modelo
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            // ahora hago el login con las variables que arme en models y llene recien
            // como en models pedimos que si el login va bien, nos devuelva la columna del usuario
            // ahora tenemos toda la info del usuario en identity
            $identity = $usuario->login();
            // utilizo la sesion para mantener al usuario identificado
            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                // tambien podemos darle mas permisos si es el admin
                if ($identity->rol == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = "Identificacion fallida";
            }

        }

        header("Location:" . base_url);

    }

    public function logout()
    {
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }

        header('Location:' . base_url . 'producto/index');

    }
}
