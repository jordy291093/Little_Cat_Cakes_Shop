<?php
    use App\Temporada;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;

    require '../../includes/app.php';
    autenticado();

    $temporada = new Temporada();

    $errores = Temporada::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $temporada = new Temporada($_POST['temporada']);

        // Generar nombre unico al imagen
        $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg";
        
        // Realizar un resize a la imagen con intervetion
        if($_FILES['temporada']['tmp_name']['imagen']) {
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['temporada']['tmp_name']['imagen']);
            $image->resize(800, 600);
            $temporada->setImagen($nombreImagen);
        }
        
        // Validar
        $errores = $temporada->validar();
        
        if(empty($errores)) {

            // Crear carpeta
            if (!is_dir(CARPETA_TEMPORADA)) {
                mkdir(CARPETA_TEMPORADA);
            }

            // Guarda la imagen en el servidor
            $image->save(CARPETA_TEMPORADA . $nombreImagen);

            // Guarda la base de datos
            $temporada->guardar();
        }
    }
    
    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Crear <span>Temporada</span></h2>
    </section>

    <main class="contenedor">
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <div class="adminTable">
            <form class="formulario" method="POST" action="/admin/temporada/crear.php" enctype="multipart/form-data">
                
                <?php include '../../includes/templates/formTemporada.php' ?>
                
                <div class="envio">
                    <input class="boton-azul" type="submit" value="Crear">

                    <a class="boton-rojo" href="/admin/temporada.php">cancelar</a>
                </div>
            </form>
        </div>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>