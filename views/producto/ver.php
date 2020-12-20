<?php if (isset($pro)): ?>
    <div class="gestionar-categorias"><h2><?=$pro->nombre;?></h2></div>
<?php else: ?>
    <h2>Product doesen't exist</h2>
<?php endif;?>

<div class="section-center">
            <div class="ver-product">
                <?php if ($pro->imagen != null): ?>
                  <img
                    src="<?=base_url?>uploads/images/<?=$pro->imagen?>"
                    alt="single product"
                    class=""
                  />
                <?php else: ?>
                    <img
                    src="<?=base_url?>uploads/images/product-1.jpeg"
                    alt="single product"
                    class=""
                  />
                <?php endif;?>

            </div>
            <div class="ver-product">
                <h4><?=$pro->precio;?></h4>
                <h4><?=$pro->descripcion;?></h4>
                <a href="<?=base_url?>carrito/add&id=<?=$pro->id?>" class="button ">Add to cart</a>
            </div>
</div>

