<?php
require_once 'models/producto.php ';

class productoController
{
    public function index()
    {

        $producto = new Producto();
        $productos = $producto->getRandom(3);

        // mostrar productos destacados, recordar cuando indexo una carpeta que los controller son exportados al index, entonces pongo la direccion de la carpeta
        // como si la estuviera mirando desde el index
        require_once 'views/producto/destacados.php';
    }

    public function ver()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];

            $producto = new Producto();
            $producto->setId($id);

            // ahora saco el producto que tiene ese id que le pase ya que es el que quiero ver
            $pro = $producto->getOne();

        }
        require_once 'views/producto/ver.php';

    }
    public function gestion()
    {
        Utils::isAdmin();

        // traigo el modelo que me conecta a la db y tiene la funcion getAll
        require_once 'models/producto.php';

        $producto = new Producto();
        $productos = $producto->getAll();

        // voy a gestionar los productos desde aca, traigo la vista que tiene el loop que contiene a getAll para mostrar los productos
        require_once 'views/producto/gestion.php';

    }

    public function crear()
    {
        Utils::isAdmin();
        // muestra el form donde introducir los datos de el nuevo producto
        require_once 'views/producto/crear.php';
    }

    public function save()
    {
        // traeria el model para usar la accion save pero ya use el require al principio del archivo

        if (isset($_POST)) {
            // traigo todas las variables con post
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;

            if ($nombre && $descripcion && $precio && $stock && $categoria) {

                $producto = new Producto();

                // ahora le doy valor a las propiedades de nuestro objeto con set
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);

                // guardar la imagen
                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }

                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);

                    }
                }

                // este emtodo lo reutilizamos para editar tambien asi que vamos a ver si le llega un id o no para ver que accion tomar
                // por suerte para guardar usamos el post ya que es info privada y para hacer las modificaciones al producto en nuestro caso como solo pasamos la id la hicimos por url por el metodo get

                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $producto->setId($id);
                    $save = $producto->edit();
                } else {
                    $save = $producto->save();
                }

                if ($save) {
                    $_SESSION['producto'] = 'complete';
                } else {
                    $_SESSION['producto'] = 'failed';

                }

            } else {
                $_SESSION['producto'] = 'failed';
            }

        } else {
            $_SESSION['producto'] = 'failed';
        }

        header("Location:" . base_url . "producto/gestion");

    }

    public function eliminar()
    {
        Utils::isAdmin();

        // me llega por url el id del producto que quiero eliminar
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);

            $delete = $producto->eliminar();

            if ($delete) {
                $_SESSION['delete'] = "complete";
            } else {
                $_SESSION['delete'] = "failed";

            }
        } else {
            $_SESSION['delete'] = "failed";

        }

        header("Location:" . base_url . "producto/gestion");

    }
    public function editar()
    {
        Utils::isAdmin();

        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            // traigo una vista en la que se encuentra el formulario, como voy a reutilizar el mismo formulario que para crear, me creo una varibale que identifique si es para editar o no
            $edit = true;

            $producto = new Producto();
            $producto->setId($id);

            // ahora saco el producto que tiene ese id que le pase ya que es el que quiero editar
            $pro = $producto->getOne();

            require_once 'views/producto/crear.php';
        } else {
            header("Location:" . base_url . "producto/gestion");

        }
    }
}
