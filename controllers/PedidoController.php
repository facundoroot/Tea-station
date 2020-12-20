<?php

require_once 'models/pedido.php';

class pedidoController
{
    public function hacer()
    {
        // aca traigo la view que tiene el formulario para hcer el pedido
        require 'views/pedido/hacer.php';
    }

    public function add()
    {
        if (isset($_SESSION['identity'])) {
            // guardar datos en la abse de datos

            // el id lo saco de la sesion del usuario
            $usuario_id = $_SESSION['identity']->id;
            // el dato del coste lo saco de stats
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            // estos datos los saco del form
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            if ($provincia && $localidad && $direccion) {
                $pedido = new Pedido();

                $pedido->setUsuario_id($usuario_id);
                $pedido->setCoste($coste);

                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);

                $save = $pedido->save();

                // guardar linea_pedido, esta va a sacar ingo de la ultima insert que hice a la tabla pedidos y va a usar los datos
                // para hacer un insert en la tabla lineas_pedido
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "complete";
                } else {
                    $_SESSION['pedido'] = "failed";

                }
            } else {
                $_SESSION['pedido'] = "failed";

            }

            header("Location:" . base_url . "pedido/confirmado");

        } else {
            header("Location:" . base_url);
        }
    }

    public function confirmado()
    {
        if (isset($_SESSION['identity'])) {
            $identity = $_SESSION['identity'];

            $pedido = new Pedido();
            // le doy el valor de id del usuario que esta loggeado
            $pedido->setUsuario_id($identity->id);
            // ahora uso esa informacion del usuario para traer las cosas necesarias con el inner join
            $pedido = $pedido->getOneByUser();

            // ahora saco los productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);

        }

        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos()
    {
        Utils::isIdentity();

        $usuario_id = $_SESSION['identity']->id;

        // saco los pedidos del usuario
        $pedido = new Pedido();
        $pedido->setUsuario_id($usuario_id);

        $pedidos = $pedido->getAllByUser();

        require_once 'views/pedido/mis_pedidos.php';
    }

    public function gestion()
    {
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        // ahora en vez de mostrar todos los pedidos del usuario, mostramos directamente todos los pedidos
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mis_pedidos.php';

    }

    public function detalle()
    {
        Utils::isIdentity();

        if (isset($_GET)) {

            $id = $_GET['id'];

            $pedido = new Pedido();
            // le doy el valor de id del usuario que esta loggeado
            $pedido->setID($id);

            $pedido = $pedido->getOne();

            // ahora saco los productos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);

            require_once 'views/pedido/detalle.php';

        } else {
            header("Location:" . base_url . "pedido/mis_pedidos");
        }

    }

    public function estado()
    {
        Utils::isAdmin();
        if (isset($_POST['pedido_id']) && isset($_POST['estado'])) {
            // Recoger datos form
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            // Upadate del pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();

            header("Location:" . base_url . 'pedido/detalle&id=' . $id);
        } else {
            header("Location:" . base_url);
        }
    }

}
