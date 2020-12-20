<?php
require_once 'models/categoria.php';
class categoriaController
{
    public function index()
    {
        Utils::isAdmin();
        // desde el modelo me creo una categoria y me traigo la funcion getAll que me muestra todas
        $categoria = new Categoria();
        $categoria->getAll();
        $categorias = $categoria->getAll();

        // ahora que ya tengo la variable categorias, me traigo la view categoria index donde adentro contiene un bucle
        // que usando categorias me va a mostrar todas las categorias que hay
        require_once 'views/categoria/index.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        // muestra el form donde introducir los datos de la nueva categoria
        require_once 'views/categoria/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        // aca llegan los datos de la nueva categoria que el usuario quiere crear
        // guardo la categoria en la base de datos
        $categoria = new Categoria();

        if (isset($_POST) && isset($_POST['nombre'])) {

            $categoria->setNombre($_POST['nombre']);
            $categoria->save();

        }

        header('Location:' . base_url . 'categoria/index');

    }
}
