
<?php
    require 'includes/app.php';  
       
    includirTemplate('header' );   
    
?>
    <main class="contenedor seccion">
      <section class="nosotros">
        <h1>Conoce sobre Nosotros</h1>
        <div class="contenido-nosotros">
          <div class="imagen">
            <picture>
              <source srcset="build/img/nosotros.webp" type="img/webp" />
              <source srcset="build/img/nosotros.jpg" type="img/jpeg" />
              <img
                loading="lazy"
                src="build/img/nosotros.jpg"
                alt="nosotros imagen"
              />
            </picture>
          </div>

          <div class="texto-nosotros">
            <blockquote>25 años de experiencia</blockquote>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui
              recusandae expedita error neque nemo itaque pariatur fuga,
              voluptates modi dolorum laudantium nulla doloremque possimus
              ratione odio ea sed harum! Distinctio. Lorem ipsum dolor sit, amet
              consectetur adipisicing elit. Alias commodi mollitia, omnis minus
              odit quae recusandae facilis, culpa, molestiae unde deserunt
              praesentium quo voluptatem laudantium magni itaque. Natus, odit
              provident? Lorem ipsum dolor sit amet consectetur adipisicing
              elit. Numquam aspernatur est dolorem eos laboriosam quibusdam
              atque rerum vel hic repudiandae dolor, temporibus accusamus, id
              odio libero nostrum enim minima iusto. Lorem ipsum dolor sit amet,
              consectetur adipisicing elit. Architecto quo nam pariatur numquam
              fuga maxime quibusdam, incidunt, asperiores laborum suscipit id
              hic fugiat molestias laudantium nostrum maiores vero minus beatae.
            </p>
          </div>
        </div>
      </section>
    </main>
    <section class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono"> 
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quidem natus, deserunt minima odit error enim cupiditate repellendus quia sequi aliquid ratione voluptatum quam dolorem quo dolore eligendi cum! Vitae.</p>
            </div><!--icono-->
            <div class="icono"> 
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quidem natus, deserunt minima odit error enim cupiditate repellendus quia sequi aliquid ratione voluptatum quam dolorem quo dolore eligendi cum! Vitae.</p>
            </div><!--icono-->
            <div class="icono"> 
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium quidem natus, deserunt minima odit error enim cupiditate repellendus quia sequi aliquid ratione voluptatum quam dolorem quo dolore eligendi cum! Vitae.</p>
            </div><!--icono--> 
        </div>
    </section>
    <?php      
    include './includes/templates/footer.php';
?>