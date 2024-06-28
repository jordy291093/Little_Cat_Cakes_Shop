<?php
    use App\Producto;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;

    require '../../includes/app.php';
    autenticado();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    $producto = Producto::find($id);
    $errores = Producto::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos
        $args = $_POST['producto'];

        $producto->sincronizar($args);

        // Validacion
        $errores = $producto->validar();
        
        // Generar nombre unico al imagen
        $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg";
        if($_FILES['producto']['tmp_name']['imagen']) {
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['producto']['tmp_name']['imagen']);
            $image->resize(800, 600);
            $producto->setImagen($nombreImagen);
        }

        // mensaje de exito
        if(empty($errores)) {
            // Almacenar la imagen
            if($_FILES['producto']['tmp_name']['imagen']) {
                // Almacenar la imagen
                $image->save(CARPETA_PRODUCTO . $nombreImagen);
            }
            $producto->guardar();
        }
    }

    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Actualizar: <span><?php echo $producto->nombre; ?></span></h2>
    </section>

    <main class="contenedor">

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <div class="adminTable">
            <form class="formulario" method="POST" enctype="multipart/form-data">
                
                <?php include '../../includes/templates/formProducto.php'; ?>

                <div class="envio">
                    <input class="boton-azul" type="submit" value="Actualizar">

                    <a class="boton-rojo" href="/admin/productos.php">cancelar</a>
                </div>
            </form>
        </div>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>