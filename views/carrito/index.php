<div class="gestionar-categorias"><h2>Shopping Cart</h2></div>

<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>

    <div class="table">
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Action</th>
        </tr>
    <?php
foreach ($carrito as $indice => $elemento):
    $producto = $elemento['producto'];
    ?>

	    <tr>
	        <td>
	            <?php if ($producto->imagen != null): ?>
	            <div class="carrito"> <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="camiseta"></div>
	            <?php else: ?>
        <img src="<?=base_url?>assets/img/camiseta.png" alt="camiseta">
    <?php endif;?>
            </td>
            <td>
                <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
            </td>
            <td>
                <?=$producto->precio?>
            </td>
            <td>
                <a class="button service-btn" href="<?=base_url?>carrito/up&index=<?=$indice?>">+</a>
                <?=$elemento['unidades']?>
                <a class="button service-btn" href="<?=base_url?>carrito/down&index=<?=$indice?>">-</a>
            </td>
            <td>
                <div class="delete"><a href="<?=base_url?>carrito/remove&index=<?=$indice?>" class="button service-btn">Delete</a></div>
            </td>
        </tr>
            <?php endforeach;?>

    </table>
    </div>

    <div class="pedido">
    <?php $stats = Utils::statsCarrito();?>
    <h4>Total: $ <?=$stats['total']?></h4>
    <a href="<?=base_url?>pedido/hacer" class="button">Make the order</a>
    <div class="delete"><a href="<?=base_url?>carrito/delete_all" class="button">Delete all</a></div>
    </div>
<?php else: ?>
<h2 class="gestionar-categorias"> There is no items in your cart</h2>
<?php endif;?>