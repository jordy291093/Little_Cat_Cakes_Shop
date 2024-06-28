<fieldset>
    <legend>Detalles para galería</legend>
    <div>
        <label for="nombre">Nombre: <span>*</span></label>
        <input value="<?php echo s($galeria->nombre);?>" name="galeria[nombre]" id="nombre" type="text">
    </div>
    <div>
        <label for="descripcion">Descripción: <span>*</span></label>
        <textarea name="galeria[descripcion]" id="descripcion"><?php echo s($galeria->descripcion);?></textarea>
    </div>
    <div>
        <label for="imagen">Imagen: <span>*</span></label>
        <input value="<?php echo s($galeria->imagen);?>" name="galeria[imagen]" id="imagen" type="file" accept="image/jpeg, image/png, image/jpg">

        <?php if ($galeria->imagen) { ?>
            <img src="/imagenes/galeria/<?php echo $galeria->imagen?>" class="imagen-small">
        <?php } ?>
    </div>
    <div class="opcion">
        <label for="tipo">Tipo: <span>*</span></label>
        <input disabled type="text" value="<?php echo $galeria->tipo?>">
        <select name="galeria[tipo]" id="tipo">
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
        <input disabled type="text" value="<?php echo $galeria->categoria?>">
        <select name="galeria[categoria]" id="categoria">
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
</fieldset>