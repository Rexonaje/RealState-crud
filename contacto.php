
<?php
    require 'includes/app.php';  
       
    includirTemplate('header' );   
    
?>
    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp" />
            <source srcset="build/img/destacada3.jpg" type="image/jpeg" />
            <img loading="lazy" src="build/img/destacada3.jpg" alt="anuncio" />
        </picture>

        <form class="formulario">
           <fieldset>
                <legend>Informacion personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre">

                <label for="email">Email</label>
                <input type="email" placeholder="Tu email" id="email">
                
                <label for="Telefono">Telefono</label>
                <input type="tel" placeholder="Tu Telefono" id="Telefono">
                
                <label for="Mensaje">Mensaje</label>
                <textarea id="Mensaje"  ></textarea>
           </fieldset>
           <fieldset>
            <legend>Informacion de compra</legend>

            <label for="Opciones">Vende o compra:</label>
            <select   id="Opciones">
                <option value="" disabled selected>--Seleccione</option>
                <option value="Compra">Compra</option>
                <option value="Venta">Venta</option>
            </select>

            <label for="Presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu Precio o Presupuesto" id="Presupuesto">
                
           </fieldset>

           <fieldset>
            <legend>Informacion de compra</legend>

            <P>Como desea ser contactado:</P>

            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input name="contactado" type="radio" value="Telefono"  id="contactar-telefono">
                <label for="contactar-Email">Email</label>
                <input name="contactado" type="radio" value="Email"  id="contactar-Email">
            </div>
            <p>Si eligió telefono, elija la fecha y la hora</p>

                        
            <label for="Fecha">Fecha</label>
            <input type="date"  id="Fecha">

            <label for="Hora">Hora</label>
            <input type="time" id="Hora" min="09:00" max="18:00">
 
           </fieldset>
           <input type="submit" class="boton-verde">
        </form>
    </main>
    <?php      
    include './includes/templates/footer.php';
?>