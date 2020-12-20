<?php
require_once 'models/producto.php';
class carritoController
{
    public function index()
    {
        if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) {
            $carrito = $_SESSION['carrito'];
            // traigo la vista que muestra la lista de los elementos del carrito
            require_once 'views/carrito/index.php';
        } else {
            $carrito = array();
        }
    }

    public function add()
    {
        // veamos si subieron a la url la id del producto que quiere aniadir al carrito
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];

        } else {
            header("Location:" . base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }

        // o sea si el counter = o o no existe es que todavia el producto no lo agregamos al carrito entocnes en vez de sumarle al counter 1
        // lo agregamos al carrito
        if (!isset($counter) || $counter == 0) {
            // conseguir el producto
            $producto = new Producto();
            $producto->setId($producto_id);
            // y ahora lo traigo de la db
            $producto = $producto->getOne();

            // ahora agrego el producto al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto,
                );

            }
        }

        header("Location:" . base_url . "carrito/index");

    }
    public function remove()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            unset($_SESSION['carrito'][$index]);

        }
        header("Location:" . base_url . "carrito/index");

    }

    public function up()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']++;

        }
        header("Location:" . base_url . "carrito/index");

    }
    public function down()
    {
        if (isset($_GET['index'])) {
            $index = $_GET['index'];
            $_SESSION['carrito'][$index]['unidades']--;

            if ($_SESSION['carrito'][$index]['unidades'] == 0) {
                unset($_SESSION['carrito'][$index]);

            }

        }
        header("Location:" . base_url . "carrito/index");

    }
    public function delete_all()
    {

        unset($_SESSION['carrito']);
        header("Location:" . base_url . "carrito/index");
    }

}
