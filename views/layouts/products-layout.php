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
          <!--dentro de este bloque es donde hacemos el nest, va a tener 3 bloques dentro de este bloque grande-->
          <!-- copio y pego 3 veces lo mismo para los 3 bloques que tienen la misma forma dentro del bloque grande -->
          <!-- single product 1 -->
          <div class="product">
            <!--ya con llamar a la imagen queda con el ancho por section-center-->
            <img
              src="./images/product-1.jpeg"
              alt="single product"
              class="product-img"
            />
            <h4 class="product-title">ginger peach tea</h4>
            <h4 class="product-price">$6.99</h4>
            <a href="#" class="button service-btn">add to cart</a>
          </div>
          <!-- end of single product 1-->
          <!-- single product 2 -->
          <div class="product">
            <!--ya con llamar a la imagen queda con el ancho por section-center-->
            <img
              src="./images/product-2.jpeg"
              alt="single product"
              class="product-img"
            />
            <h4 class="product-title">fruit sangria</h4>
            <h4 class="product-price">$6.99</h4>
            <a href="#" class="button service-btn">add to cart</a>
          </div>
          <!-- end of single product 2-->
          <!-- single product  3-->
          <div class="product">
            <!--ya con llamar a la imagen queda con el ancho por section-center-->
            <img
              src="./images/product-3.jpeg"
              alt="single product"
              class="product-img"
            />
            <h4 class="product-title">white tea</h4>
            <h4 class="product-price">$6.99</h4>
            <a href="#" class="button service-btn">add to cart</a>
          </div>
          <!-- end of single product 3-->
        </article>
      </div>
    </section>
    <!-- End of products -->
