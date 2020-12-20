    <!-- Contact -->
    <section class="contact-section">
      <div class="section-center clearfix">
        <!-- notar que ya con section center nos da el ancho y con clearfix podemos usar los float tranquilo -->
        <!--Contact info  -->
        <article class="contact-info">
          <!-- contact item 1-->
          <div class="contact-item">
            <h4 class="contact title">
              <span class="contact-icon">
                <i class="fas fa-location-arrow"></i>
              </span>
              adress
            </h4>
            <h4 class="contact-text">
              P.Sherman, Wallaby Street,42 <br />
              Sidney
            </h4>
          </div>
          <!-- end of contact item 1 -->
          <!-- contact item 2-->
          <div class="contact-item">
            <h4 class="contact title">
              <span class="contact-icon">
                <i class="fas fa-envelope"></i>
              </span>
              email
            </h4>
            <h4 class="contact-text">marlin@gmail.com</h4>
          </div>
          <!-- end of contact item 2-->
          <!-- contact item 3-->
          <div class="contact-item">
            <h4 class="contact title">
              <span class="contact-icon">
                <i class="fas fa-phone"></i>
              </span>
              telephone
            </h4>
            <h4 class="contact-text">+123 456 789</h4>
          </div>
          <!-- end of contact item 3-->
        </article>
        <!-- Contact form  -->
        <article class="contact-form">
          <h3>contact us</h3>
          <form>
            <!-- aca en form en methods siempre se pone que emtodo quiero suar, pero como voy a usar js lo dejo asi y despues lo arreglo -->
            <div class="form-group">
              <!-- inputs -->
              <input
                type="text"
                placeholder="name"
                class="form-control"
                name="name"
              />
              <input
                type="email"
                placeholder="e-mail"
                class="form-control"
                name="e-mail"
              />
              <textarea
                name="message"
                rows="5"
                placeholder="message"
                class="form-control"
              ></textarea>
            </div>
            <!-- boton -->
            <button type="submit" class="submit-btn button">submit here</button>
          </form>
        </article>
      </div>
    </section>
    <!-- End of Contact -->
