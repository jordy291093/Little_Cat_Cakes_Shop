<fieldset>
    <legend>Datos del <span>cliente</span></legend>
    <div>
        <label for="nombre">Nombre(s): <span>*</span></label>
        <input disabled value="<?php echo s($cliente->nombre);?>" name="cliente[nombre]" id="nombre" type="text">
    </div>
    <div>
        <label for="apellidos">Apellidos: <span>*</span></label>
        <input disabled value="<?php echo s($cliente->apellidos);?>" name="cliente[apellidos]" id="apellidos" type="text">
    </div>
    <div>
        <label for="celular">Celular: <span>*</span></label>
        <input disabled value="<?php echo s($cliente->celular);?>" name="cliente[celular]" id="celular" type="tel">
    </div>
    <div>
        <label for="direccion">Dirección: <span>*</span></label>
        <textarea disabled name="cliente[direccion]" id="direccion"><?php echo s($cliente->direccion);?></textarea>
    </div>
    <div>
        <label for="imagen">Imagen (Producto): <span>*</span></label>
        
        <?php if ($cliente->imagen) { ?>
            <img src="/imagenes/clientes/<?php echo $cliente->imagen?>" class="imagen-small">
        <?php } ?>
    </div>
    <div>
        <label for="precio">Precio: <span>*</span></label>
        <input disabled value="<?php echo s($cliente->precio);?>" name="cliente[precio]" id="precio" type="number">
    </div>
    <div>
        <label for="anticipo">Anticipo: <span>*</span></label>
        <input disabled value="<?php echo s($cliente->anticipo);?>" name="cliente[anticipo]" id="anticipo" type="number">
    </div>
    <div>
        <label for="restante">Restante: <span>*</span></label>
        <input disabled value="<?php echo s($cliente->restante);?>" name="cliente[restante]" id="restante" type="number">
    </div>
</fieldset>

<fieldset>
    <legend><span>Detalles</span> del producto</legend>
    <div class="opcion">
        <label for="tamaño">Tamaño: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->tamaño?>">
    </div>
    <div class="opcion">
        <label for="tipo">Tipo: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->tipo?>">
    </div>
    <div class="opcion">
        <label for="categoria">Categoría: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->categoria?>">
    </div>
</fieldset>

<fieldset>
    <legend><span>Ingredientes</span> del producto</legend>
    <div class="opcion">
        <label for="sabor">Sabor: <span>*</span></label>
        <input disabled type="text" value="<?php echo $cliente->sabor?>">
    </div>
    <div class="opcion">
        <label for="saborGurmet">Sabor Gurmet:</label>
        <input disabled type="text" value="<?php echo $cliente->saborGurmet?>">
    </div>
    <div class="opcion">
        <label for="relleno">Relleno:</label>
        <input disabled type="text" value="<?php echo $cliente->relleno?>">
    </div>
    <div class="opcion">
        <label for="rellenoExtra">Relleno Extra:</label>
        <input disabled type="text" value="<?php echo $cliente->rellenoExtra?>">
    </div>
    <div class="opcion">
        <label for="naturalExtra">Natural Extra:</label>
        <input disabled type="text" value="<?php echo $cliente->naturalExtra?>">
    </div>
</fieldset>

<fieldset>
    <legend>Estatus: <span>*</span></legend>  
    <div class="opcion">
        <label for="estatus">Estatus:</label>
        <input disabled type="text" value="<?php echo $cliente->estatus?>">
    </div>
</fieldset>

<fieldset>
    <legend>Fecha de <span>Compra</span> y <span>Entrega</span></legend>

    <label for=createdt>Fecha de Compra: <span>*</span></label>
    <input disabled value="<?php echo s($cliente->createdt);?>" name="cliente[createdt]" id="createdt" type="date">

    <label for="entrega">Fecha de Entrega: <span>*</span></label>
    <input disabled value="<?php echo s($cliente->entrega);?>" name="cliente[entrega]" id="entrega" type="date">
</fieldset>