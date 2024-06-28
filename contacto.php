<?php
    use PHPMailer\PHPMailer\PHPMailer;

    require 'includes/app.php';

    $mensaje = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $respuestas = $_POST['contacto'];
        
        $mail = new PHPMailer();

        // Configurar SMTP
        $mail->SMTPDebug = 0; // para debug = 'SMTP::DEBUG_LOWLEVEL'
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // tls = para local y ssl = hosting
        $mail->Port = $_ENV['EMAIL_PORT'];

        // configuracion el contenido del mail
        $mail->setFrom($respuestas['email']); // el que envia
        $mail->addAddress('littlecatcackesshop@littlecatcakesshop.com', 'LittleCatCakeShop.com'); // el que recibe
        $mail->Subject = 'Tienes un nuevo mensaje';

        // Habilitar HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        // Definir el contenido
        $contenido = '<html>';
        $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
        $contenido .= '<p>Correo Electronico: ' . $respuestas['email'] . '</p>';
        $contenido .= '<p>Teléfono de contacto: ' . $respuestas['telefono'] . '</p>';
        $contenido .= '<p>Comentario: ' . $respuestas['comentario'] . '</p>';
        $contenido .= '</html>';

        $mail->Body = $contenido;
        $mail->AltBody = 'Esto es texto alternativo sin HTML';

        // Enviar el email
        if ($mail->send()) {
            $mensaje = "Mensaje enviado correctamente";
        } else {
            $mensaje = "El mensaje no se pudo enviar...";
        }
    }

    incluirTemplate('header');
?>

<section class="separador">
    <h2>Cómplices de tus momentos <span>especiales</span></h2>
</section>

<main class="contenedor">
    <div class="contacto">
        <div class="logo">
            <img loading="lazy" src="/build/img/logo_principal.png" alt="Logo">
        </div>

        <div class="contacto__formulario">
            <div class="formulario__texto">
                <h3>Nos <span>encantaría</span> escucharte</h3>

                <p>Compártanos tu experiencia y/o sugerencias!</p>
            </div>

            <form class="formulario" action="/contacto.php" method="POST">
                <label for="nombre">Nombre: <span>*</span></label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" require>

                <label for="email">Correo Electrónico: <span>*</span></label>
                <input type="email" placeholder="Tu correo" id="email" name="contacto[email]" require>

                <label for="telefono">Teléfono de contacto: <span>*</span></label>
                <input type="tel" placeholder="Tu teléfono" id="telefono" name="contacto[telefono]" require>

                <label for="comentario">Comentarios: <span>*</span></label>
                <textarea name="contacto[comentario]" id="comentario" require></textarea>


                <div class="envio">
                    <input class="boton-azul" type="submit" value="Enviar">
                </div>
                
                <?php if($mensaje) { ?> 
                    <p class="alerta exito"><?php echo s($mensaje) ?></p>
                <?php } ?>

            </form>
        </div>
    </div>
</main>

<?php
    incluirTemplate('footer');
?>