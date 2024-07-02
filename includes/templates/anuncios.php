<?php
use App\Propiedad;

//debugear($_SERVER);
if($_SERVER['SCRIPT_NAME']==='/bienesraices/anuncios.php'){
    //SCRIPT_NAME viene de la supglobal server retrona el nombre de la pagina actual
    $propiedades=Propiedad::all();
}else{
    $propiedades=Propiedad::get(3);
}
 
?>

<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad){ ?>
                <div class="anuncio">
                    <picture >   
                        <img class="imagen-anuncio" loading="lazy" src="/bienesraices/imagenes/<?php echo $propiedad->imagen;?>" alt="anuncio">
                    </picture>
                    <div class="contenidio-anuncio">
                        <h3><?php echo $propiedad->titulo;?></h3>
                        <P><?php echo $propiedad->descripcion;?></P>
                        <p class="precio"><?php echo $propiedad->precio;?></p>
                        <ul class="iconos-caracteristicas">
                            <li> 
                                <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="">
                                <p><?php echo $propiedad->wc;?></p>
                            </li> 
                            <li> 
                                <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="">
                                <p><?php echo $propiedad->estacionamiento;?></p>
                            </li>
                            <li> 
                                <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="">
                                <p><?php echo $propiedad->habitaciones;?></p>
                            </li>
                        </ul>
                        <a href="anuncio.php?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">
                            Ver propiedad
                        </a>
                    </div>
                </div><!--anuncio-->
    <?php }; ?>
</div><!--contenedor-anuncios-->
