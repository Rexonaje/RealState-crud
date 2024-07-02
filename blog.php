
<?php
    require 'includes/app.php';  
       
    includirTemplate('header' );   
    
?>
    <main class="contenedor seccion contenido-centrado ">
        <h1>Nuestro Blog</h1>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="img/webp" >
                    <source srcset="build/img/blog1.jpg" type="img/jpeg" >
                    <img loading="lazy" src="build/img/blog1.jpg" alt="entrada blog">
                </picture>
            </div>
            <div class="texto-entrada"> 
                <a href="entrada.html">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p>Escrito en <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.
                    </p>
                </a>
            </div>
        </article><!--entrada-blog-->
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="img/webp" >
                    <source srcset="build/img/blog2.jpg" type="img/jpeg" >
                    <img loading="lazy" src="build/img/blog2.jpg" alt="entrada blog">
                </picture>
            </div>
            <div class="texto-entrada"> 
                <a href="entrada.html">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p>Escrito en <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.
                    </p>
                </a>
            </div>
        </article><!--entrada-blog-->
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog3.webp" type="img/webp" >
                    <source srcset="build/img/blog3.jpg" type="img/jpeg" >
                    <img loading="lazy" src="build/img/blog3.jpg" alt="entrada blog">
                </picture>
            </div>
            <div class="texto-entrada"> 
                <a href="entrada.html">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p>Escrito en <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.
                    </p>
                </a>
            </div>
        </article><!--entrada-blog-->
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog4.webp" type="img/webp" >
                    <source srcset="build/img/blog4.jpg" type="img/jpeg" >
                    <img loading="lazy" src="build/img/blog4.jpg" alt="entrada blog">
                </picture>
            </div>
            <div class="texto-entrada"> 
                <a href="entrada.html">
                    <h4>Guia para la decoracion de tu hogar</h4>
                    <p>Escrito en <span>20/10/2021</span> por: <span>Admin</span></p>

                    <p>
                        Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.
                    </p>
                </a>
            </div>
        </article><!--entrada-blog-->
    </main>
    <?php      
    include './includes/templates/footer.php';
?>