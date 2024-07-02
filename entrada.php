
<?php
    require 'includes/funciones.php';  
       
    includirTemplate('header' );   
    
?>
    <main class="contenedor seccion contenido-centrado">
      <h1>Guia para la decoracion de tu hogar</h1>

      

      <picture>
        <source srcset="build/img/destacada.webp" type="image/webp" />
        <source srcset="build/img/destacada.jpg" type="image/jpeg" />
        <img loading="lazy" src="build/img/destacada.jpg" alt="anuncio" />
      </picture>
      <p class="informacion-meta">Escrito el: <span>20/20/23</span>, por: <span>admin/</span> </p>

        <p>
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum at,
          quam totam magnam unde voluptatem, dolor optio enim blanditiis
          molestiae ducimus, doloribus consequatur ab error modi quo corporis
          qui ratione! Lorem ipsum dolor sit amet consectetur, adipisicing elit.
          Modi vitae, illum aperiam atque ut eum delectus similique tenetur
          incidunt eligendi cum velit voluptatum neque veritatis! Et placeat
          error nam! Reiciendis! Lorem ipsum dolor sit amet consectetur
          adipisicing elit. Molestias natus neque doloribus minima quod
          cupiditate dolores illo, cum eius. Libero blanditiis, accusamus
          perspiciatis molestiae nesciunt recusandae quaerat voluptas excepturi.
          Ex!
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis
          ut quis harum perspiciatis rerum suscipit necessitatibus culpa
          doloribus voluptates assumenda voluptatibus tempore deserunt repellat,
          neque quas eaque delectus eum mollitia? Lorem, ipsum dolor sit amet
          consectetur adipisicing elit. Quisquam beatae vero officiis. Nam rerum
          esse ratione, neque incidunt quidem voluptates accusamus officiis
          delectus voluptatibus. Reprehenderit accusamus aperiam tenetur ea
          ullam.
        </p>
      </div>
    </main>
    <?php      
    include './includes/templates/footer.php';
?>