<!-- voy a usar este formulario para crear pero tambien para editar asi que voy a estar usando las condiciones de mi variable editar true o false para decirle al programa que estamos editando o creando -->
<!-- si existe edit es porque estoy usando la accion editar, sino estoy usando crear -->
<!-- por otro lado hago lo mismo con la url de la action, o sea a donde lleva la info del formulario, si es edit un lado y sino otro -->
<?php if (isset($edit) && isset($pro) && is_object($pro)): ?>
	<article class="contact-form register" >
		<h3>Edit Products</h3>
		<?php $url_action = base_url . "producto/save&id=" . $pro->id;?>

<?php else: ?>
	<article class="contact-form register" >
		<h3>Create New Product</h3>
		<?php $url_action = base_url . "producto/save";?>
<?php endif;?>

<!-- ver que voy a estar usando $pro que es la variable que tiene el getOne para a cada valor de el form cuando estoy editando, ponerle como el valor predefinido, el valor de la propiedad del producto a editar en ese caso-->


    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
              <!-- inputs -->
		        <label for="nombre"></label>
		        <input type="text" placeholder ="Name" name="nombre"  class="form-control" value="<?=isset($pro) && is_object($pro) ? $pro->nombre : '';?>"/>

		        <label for="descripcion"></label>
		        <textarea placeholder ="Description" class="form-control" name="descripcion"><?=isset($pro) && is_object($pro) ? $pro->descripcion : '';?></textarea>

		        <label for="precio"></label>
		        <input placeholder ="Price" class="form-control" type="text" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : '';?>"/>

		        <label for="stock"></label>
		        <input placeholder ="Tock" class="form-control" type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : '';?>"/>



		        <label for="categoria"></label>
		        <?php $categorias = Utils::showCategorias();?>
                <!-- aca hago una lista de las categorias -->
		        <select placeholder ="Category" class="form-control" name="categoria">
			        <?php while ($cat = $categorias->fetch_object()): ?>
				        <option value="<?=$cat->id?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '';?>>
					        <?=$cat->nombre?>
				        </option>
			        <?php endwhile;?>
		        </select>



		        <label for="imagen"></label>
		        <?php if (isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
			        <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" class="thumb"/>
		        <?php endif;?>
		        <input class="form-control"  placeholder ="Image" type="file" name="imagen" />


            </div>
			<!-- boton -->

		<?php if (isset($edit) && isset($pro) && is_object($pro)): ?>
            <button type="submit" class="submit-btn button">Edit Product</button>
		<?php else: ?>
            <button type="submit" class="submit-btn button">Create Product</button>
		<?php endif;?>


    </form>
</article>