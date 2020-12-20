<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
<h2 class="gestionar-categorias">Your order has been succesfuly created</h2>
<p class="gestionar-categorias">After we recive the payment, it will be procesed and delivered</p>

    <?php if (isset($pedido)): ?>
        <h3>Order Information</h3>
        <h4>Ordern Number: <?=$pedido->id?></h4>
        <h4>Total Price: $<?=$pedido->coste?></h4>
        <h4>Products:</h4>
        <?php while ($producto = $productos->fetch_object()): ?>
            <ul>
                <li>
                    <?=$producto->nombre?> - $<?=$producto->precio?> - x<?=$producto->unidades?>
                </li>
            </ul>
        <?php endwhile;?>
    <?php endif;?>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'failed'): ?>
<div class="red">Order Failed</div>
<?php endif;?>