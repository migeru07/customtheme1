<?php 
/*
Template Name: Contacto
Description: Plantilla para el contácto...
*/
get_header(); ?>


    <section class="container blog">

        <h3 class="subtitulo text-center">CONTACTO</h3>

        <div class="row post-bloque">
          <div class="col-md-8">
            <form class="form-horizontal contacto">
              <div class="form-group">
                  <input type="text" class="form-control" placeholder="Nombre:">
              </div>
              <div class="form-group">
                  <input type="tel" class="form-control" placeholder="Telefono:">
              </div>
              <div class="form-group">
                  <input type="text" class="form-control" placeholder="Asunto:">
              </div>

              <div class="form-group">
                  <textarea class="form-control" rows="7" placeholder="Comentarios:"></textarea>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-danger">Enviar</button>
              </div>
            </form>
          </div>

          <div class="col-md-4 info-contacto">
            <strong>DIRECCIÓN:</strong>
            <p>
              1600 Amphitheatre Pkwy, CA 94043 <br>
              Mountain View<br>
              California, USA
            </p>
            <strong>EMAIL</strong>
            <p>
              <a href="mailto:contactame@miweb.com" class="correo">contactame@miweb.com</a>
            </p>
            <hr>
            <p class="contact-adicional">
              Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate, nunc.
            </p>
          </div>
        </div>

        <div class="mapa">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10657.75488944615!2d-122.08972405653138!3d37.423649444047484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba02425dad8f%3A0x6c296c66619367e0!2sGoogleplex!5e0!3m2!1sen!2sdo!4v1541369656367" width="100%" height="400" frameborder="0"  allowfullscreen class="map"></iframe>
        </div>

    </section>

<?php get_footer(); ?>