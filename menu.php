<?php
    use App\Producto;

    require 'includes/app.php';

    $productos = Producto::all();

    incluirTemplate('header');
?>

    <main class="contenedor">
        <div class="nota">
            <h2>Nota:</h2>
            <div class="nota__texto">
                <p><i class="fa-solid fa-circle-info"></i> Cotiza y agenda tus pasteles por este medio o por redes sociales oficiales.</p>
                <p><i class="fa-solid fa-circle-info"></i> Cotiza para tus eventos con 5 días de anticipación y agenda con el 50% de anticipo.</p>
            </div>
        </div>
    </main>

    <section class="separador">
        <h2>Nuestro <span>menú</span></h2>
    </section>

    <section class="container">
        <p>Dale <span>clic</span> a la imagen!!</p>

        <div class="card__container">
            <?php foreach($productos as $producto): ?>
                <article class="card__article">
                    <picture class="card__img">
                        <img loading="lazy" width="300" height="200" src="/imagenes/producto/<?php echo $producto->imagen; ?>" alt="Imagen temporada">
                    </picture>

                    <div class="card__datos">
                        <h2 class="card__titulo"><span><?php echo $producto->nombre; ?></span></h2>
                        <div class="card__descripcion"><?php echo $producto->descripcion; ?></div>

                        <a class="boton-rosa" href="detalles.php?id=<?php echo $producto->id; ?>">Ver detalles</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

<?php
    incluirTemplate('footer');
?>