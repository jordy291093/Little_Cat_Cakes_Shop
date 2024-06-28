<fieldset>
    <legend>Detalles del <span>producto</span></legend>
    <div>
        <label for="nombre">Nombre: <span>*</span></label>
        <input value="<?php echo s($producto->nombre);?>" name="producto[nombre]" id="nombre" type="text">
    </div>
    <div>
        <label for="descripcion">Descripción: <span>*</span></label>
        <textarea name="producto[descripcion]" id="descripcion"><?php echo s($producto->descripcion);?></textarea>
    </div>
    <div>
        <label for="imagen">Imagen: <span>*</span></label>
        <input value="<?php echo s($producto->imagen);?>" name="producto[imagen]" id="imagen" type="file" accept="image/jpeg, image/png, image/jpg">

        <?php if ($producto->imagen) { ?>
            <img src="/imagenes/producto/<?php echo $producto->imagen?>" class="imagen-small">
        <?php } ?>
    </div>
    <div class="opcion">
        <label for="tipo">Tipo: <span>*</span></label>
        <input disabled type="text" value="<?php echo $producto->tipo?>">
        <select name="producto[tipo]" id="tipo" >
            <option disabled selected >-- Seleccione Tipo --</option>
            <option value="Brownie">Brownie</option>
            <option value="CupCacke">CupCacke</option>
            <option value="Chocoflan">Chocoflan</option>
            <option value="Dona">Dona</option>
            <option value="Galleta">Galleta</option>
            <option value="Mostachon">Mostachon</option>
            <option value="Pastel">Pastel</option>
            <option value="Paquete">Paquete</option>
            <option value="Pay">Pay</option>
            <option value="Roles">Roles</option>
        </select>
    </div>
    <div class="opcion">
        <label for="categoria">Categoría: <span>*</span></label>
        <input disabled type="text" value="<?php echo $producto->categoria?>">
        <select name="producto[categoria]" id="categoria" >
            <option disabled selected >-- Seleccione Categoría --</option>
            <option value="Principal">***Principal ***</option>
            <option value="Anime">Anime</option>
            <option value="Baby Shower">Baby Shower</option>
            <option value="Boda">Boda</option>
            <option value="Cumpleaños">Cumpleaños</option>
            <option value="Deporte">Deporte</option>
            <option value="Fiesta">Fiesta</option>
            <option value="Graduacion">Graduación</option>
            <option value="Gurmet">Gurmet</option>
            <option value="Infantil">Infantil</option>
            <option value="Super Heroe">Super Heroe</option>
            <option value="Temporada">Temporada</option>
            <option value="Trabajo">Trabajo</option>
            <option value="Video Juegos">Video Juegos</option>
            <option value="XV Años">XV Años</option>
            <option value="Otros">Otros</option>
        </select>
    </div>
    <div>
        <label for="tamañoGde">Tamaño Grande(cm): <span>*</span></label>
        <input value="<?php echo s($producto->tamañoGde);?>" name="producto[tamañoGde]" id="tamañoGde" type="number">
    </div>
    <div>
        <label for="tamañoMed">Tamaño Mediano(cm): <span>*</span></label>
        <input value="<?php echo s($producto->tamañoMed);?>" name="producto[tamañoMed]" id="tamañoMed" type="number">
    </div>
    <div>
        <label for="tamañoCh">Tamaño Chico(cm): <span>*</span></label>
        <input value="<?php echo s($producto->tamañoCh);?>" name="producto[tamañoCh]" id="tamañoCh" type="number">
    </div>
    <div class="opcion">
        <label for="tipoCorte">Tipo de corte: <span>*</span></label>
        <input disabled type="text" value="<?php echo $producto->tipoCorte?>">
        <select name="producto[tipoCorte]" id="tipoCorte" >
            <option disabled selected >-- Seleccione Tipo de corte --</option>
            <option value="Rebanadas">Rebanadas</option>
            <option value="Piezas">Piezas</option>
        </select>
    </div>
    <div>
        <label for="cantidadGde">Cantidad Grande: <span>*</span></label>
        <input value="<?php echo s($producto->cantidadGde);?>" name="producto[cantidadGde]" id="cantidadGde" type="number">
    </div>
    <div>
        <label for="cantidadMed">Cantidad Mediano: <span>*</span></label>
        <input value="<?php echo s($producto->cantidadMed);?>" name="producto[cantidadMed]" id="cantidadMed" type="number">
    </div>
    <div>
        <label for="cantidadCh">Chico: <span>*</span></label>
        <input value="<?php echo s($producto->cantidadCh);?>" name="producto[cantidadCh]" id="cantidadCh" type="number">
    </div>
</fieldset>