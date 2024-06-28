<?php
    use App\Galeria;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;

    require '../../includes/app.php';
    autenticado();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    $galeria = Galeria::find($id);
    $errores = Galeria::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos
        $args = $_POST['galeria'];

        $galeria->sincronizar($args);

        // Validacion
        $errores = $galeria->validar();
        
        // Generar nombre unico al imagen
        $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg";
        if($_FILES['galeria']['tmp_name']['imagen']) {
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['galeria']['tmp_name']['imagen']);
            $image->resize(800, 600);
            $galeria->setImagen($nombreImagen);
        }

        // mensaje de exito
        if(empty($errores)) {
            // Almacenar la imagen
            if($_FILES['galeria']['tmp_name']['imagen']) {
                // Almacenar la imagen
                $image->save(CARPETA_GALERIA . $nombreImagen);
            }
            $galeria->guardar();
        }
    }

    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Actualizar: <span><?php echo $galeria->nombre ?></span></h2>
    </section>

    <main class="contenedor">
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <div class="adminTable">
            <form class="formulario" method="POST" enctype="multipart/form-data">

            <?php include '../../includes/templates/formGaleria.php' ?>
                
                <div class="envio">
                    <input class="boton-azul" type="submit" value="Actualizar">

                    <a class="boton-rojo" href="/admin/galeria.php">cancelar</a>
                </div>
            </form>
        </div>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>