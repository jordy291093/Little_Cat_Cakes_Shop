<?php
    use App\Cliente;

    require '../includes/app.php';
    autenticado();

    $clientes = Cliente::all();

    $resultado = $_GET['resultado'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
    }

    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Clientes</h2>
    </section>

    <section class="contenedor agregar">
        <a class="boton-rosa" href="/admin/clientes/crear.php">Agregar Cliente</a>
    </section>

    <main class="contenedor tabla">
        <?php 
            $mensaje = notificacionExito(intval($resultado));
        ?>
        <?php if($mensaje) { ?> 
            <p class="alerta exito"><?php echo s($mensaje) ?></p>
        <?php } ?>

        <div class="recomendacion">
            <p>Se <span>recomienda</span> utilizar la pantalla horizontal!</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre(s)</th>
                    <th>Producto</th>
                    <th>Fecha Compra</th>
                    <th>Fecha Entrega</th>
                    <th>Estatus</th>
                    <th>Acciónes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clientes as $cliente): ?>
                    <tr>
                        <td><img loading="lazy" width="150" height="100" src="/imagenes/clientes/<?php echo $cliente->imagen; ?>"></td>
                        <td><?php echo $cliente->nombre; ?></td>
                        <td><?php echo $cliente->tipo; ?></td>
                        <td><?php echo $cliente->createdt; ?></td>
                        <td><?php echo $cliente->entrega; ?></td>

                        <?php if($cliente->estatus == 'Entregado'): ?>
                            <td><a disabled class="boton-verde" href="#" ><?php echo $cliente->estatus; ?></a></td>

                        <?php elseif($cliente->estatus == 'Pendiente'): ?>
                            <td><a class="boton-naranja" href="#" ><?php echo $cliente->estatus; ?></a></td>
                        <?php endif; ?>
                        <td>                       
                            <a href="/admin/clientes/ver.php?id=<?php echo $cliente->id; ?>" class="boton-rosa">Ver Cliente</a>
                            
                            <a href="/admin/clientes/actualizar.php?id=<?php echo $cliente->id; ?>" class="boton-azul">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>