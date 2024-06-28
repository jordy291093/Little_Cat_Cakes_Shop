<?php
    use App\Galeria;

    require 'includes/app.php';

    $galerias = Galeria::all();

    incluirTemplate('header');
?>

    <section class="separador">
        <h2>Nuestra <span>galería</span></h2>
    </section>

    <main class="container">
        <p>Dale <span>clic</span> a la imagen!!</p>
        <div class="card__container">
            <?php foreach($galerias as $galeria): ?>
                <article class="card__article">
                    <picture class="card__img">
                        <img loading="lazy" width="300" height="200" src="/imagenes/galeria/<?php echo $galeria->imagen; ?>" alt="Imagen menu">
                    </picture>

                    <div class="card__datos">
                        <h3><?php echo $galeria->tipo; ?></h3>
                        <h2 class="card__titulo"><span><?php echo $galeria->categoria; ?></span></h2>
                        <div class="card__descripcion"><?php echo $galeria->descripcion; ?></div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </main>
    
<?php
    incluirTemplate('footer');
?>