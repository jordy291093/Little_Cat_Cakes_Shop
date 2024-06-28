<?php
    use App\Producto;

    require 'includes/app.php';

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /');
    }

    $producto = Producto::find($id);

    incluirTemplate('header');
?>

    <section class="separador">
        <h2>Detalles <span>Categoria</span></h2>
    </section>
    
    <main class="contenedor">
        <div class="detalle">
            <div class="detalle__imagen">
            <img loading="lazy" width="300" height="250" src="/imagenes/producto/<?php echo $producto->imagen; ?>" alt="Imagen detalle">
            </div>
            <div class="detalle__texto">
                <p><span>Descripción</span>: <?php echo $producto->descripcion; ?></p>

                <div class="tamaños">
                    <div class="grande">
                        <img src="/build/img/icono-pastel.png" alt="Icono">
                        <p><span>Grande</span></p>
                        <p><?php echo $producto->tamañoGde; ?> cm</p>
                        <p><?php echo $producto->cantidadGde; ?> <span><?php echo $producto->tipoCorte; ?></span></p>
                    </div>
                    <div class="mediano">
                        <img src="/build/img/icono-pastel.png" alt="Icono">
                        <p><span>Mediano</span></p>
                        <p><?php echo $producto->tamañoMed; ?> cm</p>
                        <p><?php echo $producto->cantidadMed; ?> <span><?php echo $producto->tipoCorte; ?></span></p>
                    </div>
                    <div class="chico">
                        <img src="/build/img/icono-pastel.png" alt="Icono">
                        <p><span>Chico</span></p>
                        <p><?php echo $producto->tamañoCh; ?> cm</p>
                        <p><?php echo $producto->cantidadCh; ?> <span><?php echo $producto->tipoCorte; ?></span></p>
                    </div>
                </div>

                <a class="boton-rosa" href="https://bit.ly/4c87jOE" target="_blank">Cotiza aquí <i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>