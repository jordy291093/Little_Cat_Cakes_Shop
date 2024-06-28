<fieldset>
    <legend>Datos del <span>cliente</span></legend>
    <div>
        <label for="nombre">Nombre(s): <span>*</span></label>
        <input value="<?php echo s($cliente->nombre);?>" name="cliente[nombre]" id="nombre" type="text">
    </div>
    <div>
        <label for="apellidos">Apellidos: <span>*</span></label>
        <input value="<?php echo s($cliente->apellidos);?>" name="cliente[apellidos]" id="apellidos" type="text">
    </div>
    <div>
        <label for="celular">Celular: <span>*</span></label>
        <input value="<?php echo s($cliente->celular);?>" name="cliente[celular]" id="celular" type="tel">
    </div>
    <div>
        <label for="direccion">Dirección: <span>*</span></label>
        <textarea name="cliente[direccion]" id="direccion"><?php echo s($cliente->direccion);?></textarea>
    </div>
    <div>
        <label for="imagen">Imagen del producto: <span>*</span></label>
        <input value="<?php echo s($cliente->imagen);?>" name="cliente[imagen]" id="imagen" type="file" accept="image/jpeg, image/png, image/jpg">

        <?php if ($cliente->imagen) { ?>
            <img src="/imagenes/clientes/<?php echo $cliente->imagen?>" class="imagen-small">
        <?php } ?>
    </div>
    <div>
        <label for="precio">Precio: <span>*</span></label>
        <input value="<?php echo s($cliente->precio);?>" name="cliente[precio]" id="precio" type="number">
    </div>
    <div>
        <label for="anticipo">Anticipo: <span>*</span></label>
        <input value="<?php echo s($cliente->anticipo);?>" name="cliente[anticipo]" id="anticipo" type="number">
    </div>
    <div>
        <label for="restante">Restante: <span>*</span></label>
        <input value="<?php echo s($cliente->restante);?>" name="cliente[restante]" id="restante" type="number">
    </div>
</fieldset>

<fieldset>
    <legend><span>Detalles</span> del producto</legend>
    <div class="opcion">
        <label for="tamaño">Tamaño: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->tamaño?>">
        <select name="cliente[tamaño]" id="tamaño" >
            <option disabled selected >-- Seleccione Tipo --</option>
            <option value="Chico">Chico</option>
            <option value="Mediano">Mediano</option>
            <option value="Grande">Grande</option>
        </select>
    </div>
    <div class="opcion">
        <label for="tipo">Tipo: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->tipo?>">
        <select name="cliente[tipo]" id="tipo" >
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
        <input disabled type="text" value="<?php echo $cliente->categoria?>">
        <select name="cliente[categoria]" id="categoria" >
            <option disabled selected >-- Seleccione Categoría --</option>
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

<fieldset>
    <legend><span>Ingredientes</span> del producto</legend>
    <div class="opcion">
        <label for="sabor">Sabor: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->sabor?>">
        <select name="cliente[sabor]" id="sabor" >
            <option disabled selected >-- Seleccione Sabor --</option>
            <option value="Almendra">Almendra</option>
            <option value="Café">Café</option>
            <option value="Chocolate">Chocolate</option>
            <option value="Confetti Cacke">Confetti Cacke</option>
            <option value="Fresa">Fresa</option>
            <option value="Limón">Limón</option>
            <option value="Naranja">Naranja</option>
            <option value="Piña Colada">Piña Colada</option>
            <option value="Platano">Platano</option>
            <option value="Red Velvet">Red Velvet</option>
            <option value="Vainilla">Vainilla</option>
            <option value="Zanahoria">Zanahoria</option>
        </select>
    </div>
    <div class="opcion">
        <label for="saborGurmet">Sabor Gurmet: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->saborGurmet?>">
        <select name="cliente[saborGurmet]" id="saborGurmet" >
            <option disabled selected >-- Seleccione Sabor Gurmet --</option>
            <option value="Ninguno">Ninguno</option>
            <option value="Blueberry">Blueberry</option>
            <option value="Chispas Chocolate">Chispas Chocolate</option>
            <option value="Coco">Coco</option>
            <option value="Nuez">Nuez</option>
            <option value="Oreo Cake">Oreo Cake</option>
            <option value="Pastel Italiano">Pastel Italiano</option>
        </select>
    </div>
    <div class="opcion">
        <label for="relleno">Relleno: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->relleno?>">
        <select name="cliente[relleno]" id="relleno" >
            <option disabled selected >-- Seleccione Relleno --</option>
            <option value="Ninguno">Ninguno</option>
            <option value="Blueberry">Blueberry</option>
            <option value="Cereza">Cereza</option>
            <option value="Frambuesa">Frambuesa</option>
            <option value="Fresa">Fresa</option>
            <option value="Frutos Rojos">Frutos Rojos</option>
            <option value="Zanahoria">Zanahoria</option>
        </select>
    </div>
    <div class="opcion">
        <label for="rellenoExtra">Relleno Extra: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->rellenoExtra?>">
        <select name="cliente[rellenoExtra]" id="rellenoExtra" >
            <option disabled selected >-- Seleccione Relleno Extra --</option>
            <option value="Ninguno">Ninguno</option>
            <option value="Chispas Chocolate">Chispas Chocolate</option>
            <option value="Hershey's">Hershey's</option>
            <option value="M&M">M&M</option>
            <option value="Mazapán">Mazapán</option>
            <option value="Nutella">Nutella</option>
            <option value="Oreo">Oreo</option>
            <option value="Queso Crema">Queso Crema</option>
            <option value="Resses">Resses</option>
            <option value="Snicker">Snicker</option>
        </select>
    </div>
    <div class="opcion">
        <label for="naturalExtra">Natural Extra: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->naturalExtra?>">
        <select name="cliente[naturalExtra]" id="naturalExtra" >
            <option disabled selected >-- Seleccione Natural Extra --</option>
            <option value="Ninguno">Ninguno</option>
            <option value="Almendra">Almendra</option>
            <option value="Almibar Durazno">Almibar Durazno</option>
            <option value="Blueberry">Blueberry</option>
            <option value="Frambuesa">Frambuesa</option>
            <option value="Fresa">Fresa</option>
            <option value="Nuez">Nuez</option>
            <option value="Piña Colada">Piña Colada</option>
            <option value="Zarzamora">Zarzamora</option>
        </select>
    </div>
</fieldset>

<fieldset>
    <legend>Estatus</legend>  
    <div class="opcion">
        <label for="estatus">Estatus: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->estatus?>">
        <select name="cliente[estatus]" id="estatus">
            <option disabled selected >-- Seleccione Estatus --</option>
            <option value="Entregado">Entregado</option>
            <option value="Pendiente">Pendiente</option>
        </select>
    </div>
</fieldset>

<fieldset>
    <legend>Fecha de <span>Compra</span> y <span>Entrega</span></legend>

    <label for=compra>Fecha de Compra: <span>*</span></label>
    <input value="<?php echo s($cliente->compra);?>" name="cliente[compra]" id="compra" type="date">

    <label for="entrega">Fecha de Entrega: <span>*</span></label>
    <input value="<?php echo s($cliente->entrega);?>" name="cliente[entrega]" id="entrega" type="date">
</fieldset>