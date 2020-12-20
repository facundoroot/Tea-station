<?php if (isset($_SESSION['identity'])): ?>
<h2 class="gestionar-categorias">Make the order</h2>
<a href="<?=base_url?>carrito/index">See cart products</a>

<article class="contact-form" >
          <h3>Client Order</h3>
          <form action="<?=base_url?>pedido/add" method="POst">
            <!-- aca en form en methods siempre se pone que emtodo quiero suar, pero como voy a usar js lo dejo asi y despues lo arreglo -->
            <div class="form-group">
              <!-- inputs -->
                <input
                type="text"
                placeholder="Province"
                class="form-control"
                name="provincia"
                required
              />
              <input
                type="text"
                placeholder="City"
                class="form-control"
                name="localidad"
                required
              />
                <input
                type="text"
                placeholder="Adress"
                class="form-control"
                name="direccion"
                required
              />

            </div>
            <!-- boton -->
            <button type="submit" class="submit-btn button">Make Order</button>
          </form>
        </article>


<?php else: ?>
<div class="red"><h4>You must be loged in to purchase</h4></div>
<?php endif;?>

