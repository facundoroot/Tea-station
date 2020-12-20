      <!-- sidebar -->
      <aside class="sidebar" id="sidebar">
        <div class="cosas-sidebar">
          <!-- boton x -->
          <button class="close-btn" id="close-btn">
            <i class="fas fa-times"></i>
          </button>
          <!-- nav links -->
          <ul class="sidebar-links">
            <li>
              <a href="<?=base_url?>">Home</a>
            </li>

          </ul>
          <!-- end of nav links -->

                    <!-- nav links -->
          <?php $stats = Utils::statsCarrito();?>
          <ul class="sidebar-links">
            <li>
              <a href="<?=base_url?>carrito/index">My Cart</a>
              <a href="<?=base_url?>carrito/index">Products in cart(<?=$stats['count']?>)</a>
              <a href="<?=base_url?>carrito/index">Total : $<?=$stats['total']?></a>
            </li>
          </ul>
          <!-- end of nav links -->



          <!-- vamos a hacer que si no esta la sesion identity o sea no se logeo el usuario, aparexca el formulario para que se logee -->
            <?php if (!isset($_SESSION['identity'])): ?>

             <!-- User login -->
              <article class="login-form">
                <form action="<?=base_url?>usuario/login" method="POST">
                  <div class="form-group">
                    <input type="email" placeholder="e-mail" class="form-control" name="email"  required>
                    <input type="password" placeholder="password" class="form-control" name="password"  required>
                    <button type="submit" class="submit-btn button">Login</button>
                  </div>
                </form>
              </article>
              <!-- end of user login -->

              <!-- en cambio si ya esta logeado, aparece el nombre y apellido de la persona -->
            <?php else: ?>
             <div class="nombre"><h3><?=$_SESSION['identity']->nombre?><?=$_SESSION['identity']->apellidos?></h3></div>
            <?php endif;?>


            <div class="manage">

              <!-- aparece cuando la sesion esta iniciada (ver controller) -->
              <div>
                <?php if (isset($_SESSION['identity'])): ?>
                <div><a href="<?=base_url?>usuario/logout">Close session</a></div>
                <div><a href="<?=base_url?>pedido/mis_pedidos" class="espacio">My orders</a></div>
                <?php else: ?>
                  <a href="<?=base_url?>usuario/registro">Register</a>
                <?php endif;?>
              </div>

              <div class="links-manage">
                <!-- aparecen estas opciones solo para el admin (ver controller) -->
                <?php if (isset($_SESSION['admin'])): ?>
                <a href="<?=base_url?>pedido/gestion" class="espacio">Manage my orders</a>
                <a href="<?=base_url?>producto/gestion">Manage products</a>
                <a href="<?=base_url?>categoria/index">Manage categories</a>
                <?php endif;?>
              </div>


            </div>
        </div>
      </aside>
      <!-- end of sidebar -->

