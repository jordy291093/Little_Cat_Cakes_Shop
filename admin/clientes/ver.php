<?php
    use App\Cliente;

    require '../../includes/app.php';
    autenticado();

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    $cliente = Cliente::find($id);

    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Cliente: <span><?php echo $cliente->nombre; ?></span></h2>
    </section>

    <main class="contenedor">
        <div class="adminTable">
            <form class="formulario" method="POST" enctype="multipart/form-data">
                
            <?php include '../../includes/templates/verCliente.php'; ?>

                <div class="envio">
                    <a class="boton-rojo" href="/admin/clientes.php">Regresar</a>
                </div>
            </form>
        </div>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>