<?php
    use App\Temporada;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;

    require '../../includes/app.php';
    autenticado();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    $temporada = Temporada::find($id);
    $errores = Temporada::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos
        $args = $_POST['temporada'];

        $temporada->sincronizar($args);

        // Validacion
        $errores = $temporada->validar();
        
        // Generar nombre unico al imagen
        $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg";
        if($_FILES['temporada']['tmp_name']['imagen']) {
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['temporada']['tmp_name']['imagen']);
            $image->resize(800, 600);
            $temporada->setImagen($nombreImagen);
        }

        // mensaje de exito
        if(empty($errores)) {
            // Almacenar la imagen
            if($_FILES['temporada']['tmp_name']['imagen']) {
                // Almacenar la imagen
                $image->save(CARPETA_TEMPORADA. $nombreImagen);
            }
            $temporada->guardar();
        }
    }

    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Actualizar: <span><?php echo $temporada->nombre ?></span></h2>
    </section>

    <main class="contenedor">
     <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <div class="adminTable">
            <form class="formulario" method="POST" enctype="multipart/form-data">
                
                <?php include '../../includes/templates/formTemporada.php' ?>
                
                <div class="envio">
                    <input class="boton-azul" type="submit" value="Actualizar">

                    <a class="boton-rojo" href="/admin/temporada.php">cancelar</a>
                </div>
            </form>
        </div>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>