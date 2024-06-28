<?php
    use App\Cliente;
    use Intervention\Image\ImageManager as Image;
    use Intervention\Image\Drivers\Gd\Driver;

    require '../../includes/app.php';
    autenticado();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    $cliente = Cliente::find($id);
    $errores = Cliente::getErrores();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Asignar los atributos
        $args = $_POST['cliente'];

        $cliente->sincronizar($args);

        // Validacion
        $errores = $cliente->validar();
        
        // Generar nombre unico al imagen
        $nombreImagen = md5(uniqid(rand(), true ) ) . ".jpg";

        if($_FILES['cliente']['tmp_name']['imagen']) {
            $manager = new Image(Driver::class);
            $image = $manager->read($_FILES['cliente']['tmp_name']['imagen']);
            $image->resize(800, 600);
            $cliente->setImagen($nombreImagen);
        }

        // mensaje de exito
        if(empty($errores)) {
            // Almacenar la imagen
            if($_FILES['cliente']['tmp_name']['imagen']) {
                // Almacenar la imagen
                $image->save(CARPETA_CLIENTES . $nombreImagen);
            }

            $cliente->guardar();
        }
    }

    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Actualizar cliente: <span><?php echo $cliente->nombre; ?></span></h2>
    </section>

    <main class="contenedor">

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <div class="adminTable">
            <form class="formulario"  method="POST" enctype="multipart/form-data">
                
                <?php include '../../includes/templates/formCliente.php'; ?>

                <div class="envio">
                    <input class="boton-azul" type="submit" value="Actualizar">

                    <a class="boton-rojo" href="/admin/clientes.php">cancelar</a>
                </div>
            </form>
        </div>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>