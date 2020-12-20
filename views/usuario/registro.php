
  <article class="contact-form register">
  <h3>Register</h3>



  <!-- habiamos creado sesiones en el controlador en el save que su valor dependia de si se habia registrado bien o no -->
  <?php if (isset($_SESSION['register']) && $_SESSION['register'] == "complete"): ?>
    <div class="green"><h4>Registration Complete</h4></div>
  <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == "failed"): ?>
    <div class="red"><h4>Registration Failed, enter the fields correctly</h4></div>
  <?php endif;?>
  <!-- ahora borro los datos de la sesion para que no me quede siempre "registration complete" o "Registration failed" -->
  <?php Utils::deleteSession('register');?>




          <form action="<?=base_url?>usuario/save" method="POST">
            <!-- aca en form en methods siempre se pone que emtodo quiero suar, pero como voy a usar js lo dejo asi y despues lo arreglo -->
            <div class="form-group">
              <!-- inputs -->
              <input
                type="text"
                placeholder="name"
                class="form-control"
                name="nombre"
                required
              />
              <input
                type="text"
                placeholder="last name"
                class="form-control"
                name="apellidos"
                required
              />
              <input
                type="email"
                placeholder="e-mail"
                class="form-control"
                name="email"
                required
              />
              <input
                type="password"
                placeholder="password"
                class="form-control"
                name="password"
                required
              />
            </div>
            <!-- boton -->
            <button type="submit" class="submit-btn button">Register</button>
          </form>
        </article>
