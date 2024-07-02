<fieldset>
                <legend>Informacion General</legend>
                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="propiedad[titulo]"  placeholder="Titulo propiedad" value="<?php

//use App\vendedores;

 echo sanitizar($propiedad->titulo); ?>" >
                
                <label for="precio">Precio</label>
                <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio propiedad" value="<?php echo sanitizar($propiedad->precio); ?>">

                <label for="imagen">imagen </label>
                <input type="file" id="imagen" name="propiedad[imagen]" accept="image/jpeg, image/img"   >

                <?php if($propiedad->imagen){  ?>
                        <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen-small">
                <?php }?>
                <label for="descripcion"></label>
                <textarea  id="descripcion"   name="propiedad[descripcion]" placeholder="descripcion propiedad"  > <?php echo sanitizar($propiedad->descripcion); ?>  </textarea>
            </fieldset>
            <fieldset>
                <legend> Informacion Propiedad</legend>

                <label for="habitaciones">habitaciones:</label>
                <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" min="1" max="9" value="<?php echo sanitizar($propiedad->habitaciones); ?>" >

                <label for="wc">Baños:</label>
                <input type="number" id="wc" placeholder="Ej: 3" name="propiedad[wc]" min="1" max="9" value="<?php echo sanitizar($propiedad->wc); ?>">

                <label for="estacionamiento">Estacionamientos</label>
                <input type="number" id="estacionamiento"  name="propiedad[estacionamiento]" placeholder="Ej: 3" min="1" max="9" value="<?php echo sanitizar($propiedad->estacionamiento); ?>" >
            </fieldset>
            <fieldset>
                <legend>Vendedor</legend>
                    <label for="vendedor"></label>
                    <select name="propiedad[vendedores_id]" id="vendedor">
                        <option selected value="">--seleccione--</option>
                        <?php foreach ($vendedores as $vendedor):?>
                            <option
                                <?php echo $propiedad->vendedores_id===$vendedor->id ?'selected' :'';?>
                            value="<?php echo sanitizar($vendedor->id);?>"> <?php echo sanitizar($vendedor->nombre) . " ". sanitizar($vendedor->apellido);?> </option>
                        <?php endforeach;?>
                    </select>
                </select>
            </fieldset>