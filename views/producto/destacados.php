 <!-- Products-->
    <section class="products">
      <div class="section-center">
        <!-- le pongo clase section-center ya que la tengo en global style, me da el formato del ancho, como voy a hacer un nest, tambien le pongo la clase clearfixed ya que voy a usar floats para los dos bloques principales y luego adentro de uno de los bloques, los bloques mas chicos-->
        <!-- Product info(el texto) -->
        <article class="products-info">
          <!--  section title (reutilizado)-->
          <div class="section-title">
            <h3>Check Out</h3>
            <h2>our products</h2>
          </div>
          <!-- end of section title -->
          <p class="product-text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro,
            libero? Repellendus earum ut soluta saepe sint ipsum, repudiandae ab
            eius debitis consequatur et quo inventore!
          </p>
        </article>
        <!-- Product Inventory, el bloque que contiene los bloques mas chicos (nesting)-->


        <article class="products-inventory clearfix">
          <!-- voy a hacer un loop para mostrar los productos -->
            <?php while ($product = $productos->fetch_object()): ?>
              <!-- single product 1 -->
              <div class="product">
                <!--ya con llamar a la imagen queda con el ancho por section-center-->

              <a href="<?=base_url?>producto/ver&id=<?=$product->id?>">
                <?php if ($product->imagen != null): ?>
                  <img
                    src="<?=base_url?>uploads/images/<?=$product->imagen?>"
                    alt="single product"
                    class="product-img"
                  />
                <?php else: ?>
                    <img
                    src="<?=base_url?>uploads/images/product-1.jpeg"
                    alt="single product"
                    class="product-img"
                  />
                <?php endif;?>

                  <h4 class="product-title"><?=$product->nombre;?></h4>
                </a>
                  <h4 class="product-price">$<?=$product->precio;?></h4>

              <a href="<?=base_url?>carrito/add&id=<?=$product->id?>" class="button service-btn">add to cart</a>
              </div>
              <!-- end of single product 1-->
          <?php endwhile;?>


        </article>
      </div>
    </section>
    <!-- End of products -->

<?php
require_once 'views/layouts/services-layout.php';
require_once 'views/layouts/about-layout.php';
require_once 'views/layouts/contact-layout.php';
?>

