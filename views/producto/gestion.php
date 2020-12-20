<div class="gestionar-categorias"><h2>Products Management</h2></div>

<!-- agrego un boton para agregar categorias -->
<div class="nueva-clase"><a href="<?=base_url?>producto/crear" class="button">New Product</a></div>

<!-- muestro si fue bien o mal la creacion del nuevo producto -->
<!-- ahora la notificacion si se creo bien o no el producto -->
<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <div class="green"><h4>New product added correctly</h4></div>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
    <div class="red"><h4>Failed</h4></div>
<?php endif;?>
<!-- luego cierro la sesion par que no este constantemente en la view el mensaje -->
<?php Utils::deleteSession('producto');?>


<!-- muestro si fue bien o mal borrando producto -->
<!-- ahora la notificacion si se borro o no el producto -->
<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
    <div class="green"><h4>Delete Succesful</h4></div>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
    <div class="red"><h4>Failed</h4></div>
<?php endif;?>
<!-- luego cierro la sesion par que no este constantemente en la view el mensaje -->
<?php Utils::deleteSession('delete');?>

<!-- me armo un bucle que itera y recorre todos los objetos, los convierte en objetos con fetch objetc y cada iteracion la guarda dentro de cat-->
<!-- ahora voy a mostrar los que hay, recordar que funciones,clases y objetos estan armados en controller y model y todo se imorta al index -->
<table>
    <tr>
        <th><h3>ID</h3></th>
        <th><h3>Nombre</h3></th>
        <th><h3>Precio</h3></th>
        <th><h3>Stock</h3></th>
        <th><h3>Action</h3></th>


    </tr>
 <!-- con esta funcion voy a iterar y recorrer los objetos que tengo y mostrarlos  -->
<?php while ($pro = $productos->fetch_object()): ?>
    <tr>
        <td><h4><?=$pro->id;?></h4></td>
        <td><h4><?=$pro->nombre;?></h4></td>
        <td><h4><?=$pro->precio;?></h4></td>
        <td><h4><?=$pro->stock;?></h4></td>
        			<td>
				<a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button service-btn">Edit</a>
				<div class="remove"><a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button service-btn">Delete</a></div>
			</td>

    </tr>

<?php endwhile;?>

</table>
