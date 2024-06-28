<?php

    use App\Cliente;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;

    require '../../includes/app.php';
    autenticado();

    $cliente = new Cliente();

    $errores = Cliente::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $cliente = new Cliente($_POST['cliente']);

        // Generar nombre unico al imagen
        $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg";
        // debug($_FILES);
        // Realizar un resize a la imagen con intervetion
        if($_FILES['cliente']['tmp_name']['imagen']) {
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['cliente']['tmp_name']['imagen']);
            $image->resize(800, 600);
            $cliente->setImagen($nombreImagen);
        }
        
        // Validar
        // $errores = $cliente->validar();
        
        if(empty($errores)) {

            // Crear carpeta
            if (!is_dir(CARPETA_CLIENTES)) {
                mkdir(CARPETA_CLIENTES);
            }

            // Guarda la imagen en el servidor
            $image->save(CARPETA_CLIENTES . $nombreImagen);

            // Guarda la base de datos
            $cliente->guardar();
        }
    }

    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Crear <span>Clientes</span></h2>
    </section>

    <main class="contenedor">

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <div class="adminTable">
            <form class="formulario"  method="POST" action="/admin/clientes/crear.php" enctype="multipart/form-data">

                <?php include '../../includes/templates/formCliente.php'; ?>
                
                <div class="envio">
                    <input class="boton-azul" type="submit" value="Crear">

                    <a class="boton-rojo" href="/admin/clientes.php">cancelar</a>
                </div>
            </form>
        </div>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>