<fieldset>
    <legend>Detalles para temporada</legend>
    <div>
        <label for="nombre">Nombre: <span>*</span></label>
        <input value="<?php echo $temporada->nombre?>" name="temporada[nombre]" id="nombre" type="text">
    </div>
    <div>
        <label for="descripcion">Descripción: <span>*</span></label>
        <textarea name="temporada[descripcion]" id="descripcion"><?php echo $temporada->descripcion?></textarea>
    </div>
    <div>
        <label for="imagen">Imagen: <span>*</span></label>
        <input value="<?php echo $temporada->imagen?>" name="temporada[imagen]" id="imagen" type="file" accept="image/jpeg, image/png">

        <?php if ($temporada->imagen) { ?>
            <img src="/imagenes/temporada/<?php echo $temporada->imagen?>" class="imagen-small">
        <?php } ?>
    </div>
    <div class="opcion">
        <label for="tipo">Tipo: <span>*</span></label>
        <input disabled type="text" value="<?php echo $temporada->tipo?>">
        <select name="temporada[tipo]" id="tipo">
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
</fieldset>