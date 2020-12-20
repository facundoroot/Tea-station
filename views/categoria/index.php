<div class="gestionar-categorias"><h2>Gestionar Categorias</h2></div>

<!-- agrego un boton para agregar categorias -->
<div class="nueva-clase"><a href="<?=base_url?>categoria/crear" class="button">New Category</a></div>

<!-- me armo un bucle que itera y recorre todos los objetos, los convierte en objetos con fetch objetc y cada iteracion la guarda dentro de cat-->
<!-- ahora voy a mostrar las categorias que hay, recordar que funciones,clases y objetos estan armados en controller y model y todo se imorta al index -->
<table>
    <tr>
        <th><h3>ID</h3></th>
        <th><h3>Nombre</h3></th>
    </tr>
 <!-- con esta funcion voy a iterar y recorrer los objetos que tengo y mostrarlos  -->
<?php while ($cat = $categorias->fetch_object()): ?>
    <tr>
        <td><h4><?=$cat->id;?></h4></td>
        <td><h4><?=$cat->nombre;?></h4></td>
    </tr>
<?php endwhile;?>

</table>