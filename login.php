<?php
    require 'includes/app.php';

    $db = conectarDB();

    // Errores
    $errores = [];

    // Autenticar el usuario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // debug($_POST);

        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db,$_POST['password']);

        if(!$email) {
            $errores[] = "El correo es obligatorio o no es valido";
        }

        if(!$password) {
            $errores[] = "El password es obligatorio ";
        }

        if(empty($errores)) {
            // Revisar si el usuario existe
            $query = "SELECT * FROM usuario WHERE email = '{$email}'";
            $resultado = mysqli_query($db, $query);

            // debug($resultado);

            if($resultado->num_rows) {
                // Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                // debug($usuario['password']);

                // Vereficar si el password es correcto o no
                $auth = password_verify($password, $usuario['password']);

                if($auth) {
                    // El usuario es autenticado
                    session_start();

                    // Llenar el arrelgo de la sesion
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    // debug($_SESSION);
                    header('Location: /admin');

                } else {
                    $errores[] = "El password es incorrecto";
                }
            } else {
                $errores[] = "El usuario no existe";
            }
        }
    }

    incluirTemplate('header');
?>

    <section class="separador">
        <h2><span>Login</span></h2>
    </section>

    <main class="contenedor">
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <div class="contacto">
            <div class="logo">
                <img loading="lazy" src="/build/img/logo_principal.png" alt="Logo">
            </div>

            <div class="contacto__formulario">
                <form id="formulario" class="formulario" method="POST" novalidate>
                    <label for="email">Correo: <span>*</span></label>
                    <input type="email" name="email" id="email" placeholder="Email" require>

                    <label for="password">Password: <span>*</span></label>
                    <div class="pass">
                        <input type="password" name="password" id="password" placeholder="Password" require>
                        <i class="fa-solid fa-eye"></i>
                    </div>

                    <div class="envio">
                        <input id="enviar" class="boton-azul" type="submit" value="Iniciar Sesión">

                        <a class="boton-rojo" href="/index.php">cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>