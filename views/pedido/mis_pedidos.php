<?php if (isset($gestion)): ?>
<h2 class="gestionar-categorias">Manage Orders</h2>
<?php else: ?>
<h2 class="gestionar-categorias">My Orders</h2>
<?php endif;?>

<div class="table">
<table>
    <tr>
        <th>Order Number</th>
        <th>Cost</th>
        <th>Date</th>
        <th>State</th>
    </tr>
    <?php while ($ped = $pedidos->fetch_object()): ?>

        <tr>
            <td>
            <a href="<?=base_url?>pedido/detalle&id=<?=$ped->id?>"><?=$ped->id?></a>
            </td>
            <td>
                $<?=$ped->coste?>
            </td>
            <td>
                <?=$ped->fecha?>
            </td>
            <td>
                <?=Utils::showStatus($ped->estado);?>
            </td>
        </tr>
    <?php endwhile;?>

</table>
</div>