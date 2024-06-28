<?php
    use App\Galeria;
    use App\Temporada;
    use App\Producto;

    require 'includes/app.php';

    $galerias = Galeria::all();
    $temporadas = Temporada::all();
    $productos = Producto::all();

    $resultado = $_GET['resultado'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
    }

    incluirTemplate('header');
?>

    <section class="inicio">
        <div class="inicio__detalles">
            <div class="detalles__texto">
                <h1>Cómplices de tus <br> momentos <span>¡Especiales!</span></h1>
            </div>
    
            <a href="menu.php" class="boton-rosa">¡Elegir mi postre!</a>
        </div>
    </section>

    <section class="separador">
        <h2>Pastelitos <span>personalizados</span> y postrecitos hechos con mucho <span>amor</span>!</h2>
    </section>

    <main id="index" class="container">
        <p>Dale <span>clic</span> a la imagen!!</p>
        <div class="card__container">
            <?php foreach($galerias as $galeria): ?>
                <?php if($galeria->categoria == 'Principal'): ?>
                    <article class="card__article">
                        <picture class="card__img">
                            <img loading="lazy" width="300" height="200" src="/imagenes/galeria/<?php echo $galeria->imagen; ?>" alt="Imagen galeria">
                        </picture>

                        <div class="card__datos">
                            <h3><?php echo $galeria->nombre; ?></h3>
                            <h2 class="card__titulo"><span><?php echo $galeria->tipo; ?></span></h2>
                            <div class="card__descripcion"><?php echo $galeria->descripcion; ?></div>
                        </div>
                    </article>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <a class="boton-rosa" href="galeria.php">Visita nuestra galería!</a>
    </main>

    <section class="separador"> 
        <h2>Eso que te hace <span>feliz</span></h2>
    </section>

    <section class="contenedor">
        <div class="mensaje">
            <div class="mensaje__imagen">
                <img loading="lazy" width="300" height="200" src="/build/img/mensaje.jpg" alt="Imagen">
            </div>
            <div class="mensaje__texto">
                <h3>Fresco y delicioso</h3>
                
                <p>En nuestra pastelería, cada bocado es una celebración. Nos dedicamos con <span>pasión</span> y <span>amor</span> a crear delicias que no solo deleitan el paladar, sino que también alimentan el alma.</p>

                <p>Cada postre que sale de nuestro horno está hecha con los mejores ingredientes, mucho <span>cariño</span> y una pizca de <span>magia</span>.</p>

                <p>No solo vendemos pasteles, vendemos <span>sonrisas</span>, <span>recuerdos</span> y pequeños momentos de <span>felicidad</span>.</p>
            </div>
        </div>
    </section>

    <section class="separador"> 
        <h2>Te acompañamos hasta en las <span>temporadas</span></h2>
    </section>

    <section id="index" class="container temporada">
        <p>Dale <span>clic</span> a la imagen!!</p>
        
        <div class="card__container">
            <?php foreach($temporadas as $temporada): ?>
                <article class="card__article">
                    <picture class="card__img">
                        <img loading="lazy" width="300" height="200" src="/imagenes/temporada/<?php echo $temporada->imagen; ?>" alt="Imagen temporada">
                    </picture>

                    <div class="card__datos">
                        <h2 class="card__titulo"><span><?php echo $temporada->nombre; ?></span></h2>
                        <div class="card__descripcion"><?php echo $temporada->descripcion; ?></div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <a class="boton-rosa" href="https://bit.ly/3wXPAdX" target="_blank">Cotizar Temporada <i class="fa-brands fa-whatsapp"></i></a>
    </section>

    <section class="separador"> 
        <h2>La mejor <span>colección</span> de postres</h2>
    </section>

    <div class="contenedor nota">
        <h2>Nota:</h2>
        <div class="nota__texto">
            <p><i class="fa-solid fa-circle-info"></i> Cotiza y agenda tus pasteles por este medio o por redes sociales oficiales.</p>
            <p><i class="fa-solid fa-circle-info"></i> Cotiza para tus eventos con 5 días de anticipación y agenda con el 50% de anticipo.</p>
        </div>
    </div>

    <section id="index" class="container">
        <p>Dale <span>clic</span> a la imagen!!</p>

        <div class="card__container">
            <?php foreach($productos as $producto): ?>
                <?php if($producto->categoria == 'Principal'): ?>
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
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        
        <a class="boton-rosa" href="menu.php">Ver más...</a>
    </section>

    <section class="separador"> 
        <h2>La <span>felicidad</span> te espera</h2>
    </section>

    <section>
        <div class=" contenedor publicidad">
            <div class="logo">
                <img loading="lazy" src="/build/img/logo_principal.png" alt="Logo">
            </div>
            <div class="publicidad__texto">
                <p>
                    Nuestro compromiso es brindarte siempre lo <span>mejor</span>, porque <br> 
                    sabemos que cada vez que eliges nuestra pastelería <span>Little Cat Cacke's Shop</span>&copy;, nos estás confiando una parte de tus momentos más <span>preciados</span>.
                </p>

                <a class="boton-rosa" href="https://bit.ly/4c87jOE" target="_blank">Cotiza aquí <i class="fa-brands fa-whatsapp"></i></a>

                <h3>Visita nuestras Redes Sociales Oficiales</h3>

                <div class="redes">
                    <a href="https://www.tiktok.com/@litte.cat.cakes.s" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100075713028635" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                </div> 

                <div class="ubicacion">
                    <a href="https://maps.app.goo.gl/G5moxkLMtnGCUX8GA" target="_blank"><i class="fa-solid fa-location-dot"></i> Cd. Juárez, Chihuahua, México</a>
                </div>
            </div>
        </div>
    </section>
<?php 
    incluirTemplate('footer');
?>