<?php

    use App\Producto;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;

    require '../../includes/app.php';
    autenticado();

    $producto = new Producto();

    $errores = Producto::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $producto = new Producto($_POST['producto']);

        // Generar nombre unico al imagen
        $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg";
        
        // Realizar un resize a la imagen con intervetion
        if($_FILES['producto']['tmp_name']['imagen']) {
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['producto']['tmp_name']['imagen']);
            $image->resize(800, 600);
            $producto->setImagen($nombreImagen);
        }
        
        // Validar
        $errores = $producto->validar();
        
        if(empty($errores)) {

            // Crear carpeta
            if (!is_dir(CARPETA_PRODUCTO)) {
                mkdir(CARPETA_PRODUCTO);
            }

            // Guarda la imagen en el servidor
            $image->save(CARPETA_PRODUCTO . $nombreImagen);

            // Guarda la base de datos
            $producto->guardar();
        }
    }

    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Crear <span>Producto</span></h2>
    </section>

    <main class="contenedor">
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <div class="adminTable">
            <form class="formulario" method="POST" action="/admin/productos/crear.php" enctype="multipart/form-data">

                <?php include '../../includes/templates/formProducto.php'; ?>

                <div class="envio">
                    <input class="boton-azul" type="submit" value="Crear">

                    <a class="boton-rojo" href="/admin/productos.php">cancelar</a>
                </div>
            </form>
        </div>
    </main>
<?php
    incluirTemplate('footerAdmin');
?>