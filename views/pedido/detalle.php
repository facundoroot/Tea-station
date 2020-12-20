<div class="gestionar-categorias"><h2>Order Details</h2></div>

<?php if (isset($pedido)): ?>


    <?php if (isset($_SESSION['admin'])): ?>
            <div class="form-group">
            <h3>Change products state</h3>
            <form action="<?=base_url?>pedido/estado" method="POST">
                <input type="hidden" value="<?=$pedido->id?>" name="pedido_id">
                <select name="estado" class="form-control">
                <option value="confirm">Confirm</option>
                <option value="preparation">Preparing to Send</option>
                <option value="ready">Ready</option>
                <option value="sended">Sent</option>
                </select>
                <button type="submit" class="submit-btn button">Submit</button>
            </form>
            </div>
    <?php endif;?>



    <div class="table">
    <table>
    <h4>Province: <?=$pedido->provincia;?></h4>
    <h4>Adress: <?=$pedido->direccion;?></h4>
    <h4>Order ID: <?=$pedido->id;?></h4>
    <h4>Price: $<?=$pedido->coste;?></h4>
    <h4>State: <?=Utils::showStatus($pedido->estado);?></h4>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Unidades</th>
                </tr>
                <?php while ($producto = $productos->fetch_object()): ?>
                    <tr>
                        <td>
                            <?php if ($producto->imagen != null): ?>
                                <div class="carrito"><img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="img_carrito" /></div>
                            <?php else: ?>
                                <div class="carrito"><img src="<?=base_url?>assets/img/camiseta.png" class="img_carrito" /></div>
                            <?php endif;?>
                        </td>
                        <td>
                            <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
                        </td>
                        <td>
                            <?=$producto->precio?>
                        </td>
                        <td>
                            <?=$producto->unidades?>
                        </td>
                    </tr>
                <?php endwhile;?>
            </table>
</div>
<?php endif;?>