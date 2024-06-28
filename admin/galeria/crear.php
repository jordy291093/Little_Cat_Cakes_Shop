<?php
    use App\Galeria;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;

    require '../../includes/app.php';
    autenticado();

    $galeria = new Galeria();

    $errores = Galeria::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $galeria = new Galeria($_POST['galeria']);

        // Generar nombre unico al imagen
        $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg";
        
        // Realizar un resize a la imagen con intervetion
        if($_FILES['galeria']['tmp_name']['imagen']) {
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['galeria']['tmp_name']['imagen']);
            $image->resize(800, 600);
            $galeria->setImagen($nombreImagen);
        }
        
        // Validar
        $errores = $galeria->validar();
        
        if(empty($errores)) {

            // Crear carpeta
            if (!is_dir(CARPETA_GALERIA)) {
                mkdir(CARPETA_GALERIA);
            }

            // Guarda la imagen en el servidor
            $image->save(CARPETA_GALERIA . $nombreImagen);

            // Guarda la base de datos
            $galeria->guardar();
        }
    }
    
    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Crear <span>Galería</span></h2>
    </section>

    <main class="contenedor">
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <div class="adminTable">
            <form class="formulario" method="POST" action="/admin/galeria/crear.php" enctype="multipart/form-data">
                
                <?php include '../../includes/templates/formGaleria.php' ?>
                
                <div class="envio">
                    <input class="boton-azul" type="submit" value="Crear">

                    <a class="boton-rojo" href="/admin/galeria.php">cancelar</a>
                </div>
            </form>
        </div>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>