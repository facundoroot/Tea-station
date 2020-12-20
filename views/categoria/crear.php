
<article class="contact-form register" >
          <h3>Create New Category</h3>
          <form action="<?=base_url?>categoria/save" method="POST">
            <!-- aca en form en methods siempre se pone que emtodo quiero suar, pero como voy a usar js lo dejo asi y despues lo arreglo -->
            <div class="form-group">
              <!-- inputs -->
              <input
                type="text"
                placeholder="Category Name"
                class="form-control"
                name="nombre"
                required
              />

            </div>
            <!-- boton -->
            <button type="submit" class="submit-btn button">Create Category</button>
          </form>
</article>