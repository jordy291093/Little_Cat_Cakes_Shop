<?php 
    require 'includes/app.php';
    use App\Usuario;

    $usuario = new Usuario;

    $errores = Usuario::getErrores();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $usuario = new Usuario($_POST['usuario']);

        $errores = $usuario->validar();

        if (empty($errores)) {
            $usuario->crearUser();
        }
    }

    incluirTemplate('header');
?>

    <main class="contenedor login">

        <div class="titulo">
            <h1>Crear cuenta</h1>
        </div>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/usuario.php">
            
            <label for="email">Correo: <span>*</span></label>
            <input type="email" name="usuario[email]" id="email" value="<?php echo s($usuario->email); ?>" placeholder="Email" require>

            <label for="password">Password: <span>*</span></label>
            <div class="pass">
                <input type="password" name="usuario[password]" id="password" value="<?php echo s($usuario->password); ?>" placeholder="Password" require>
                <i class="fa-solid fa-eye"></i>
            </div>

            <div class="envio">
                <a class="boton-rojo" href="/index.php">cancelar</a>

                <input id="enviar" class="boton-azul" type="submit" value="Crear">
            </div>
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>