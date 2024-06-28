<?php
    use App\Producto;
    
    require '../includes/app.php';
    autenticado();

    $productos = Producto::all();

    $resultado = $_GET['resultado'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
    }

    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Productos</h2>
    </section>

    <section class="contenedor agregar">
        <a class="boton-rosa" href="/admin/productos/crear.php">Agregar Producto</a>
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
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Categoría</th>
                    <th>Corte</th>
                    <th>Acciónes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productos as $producto): ?>
                    <tr class="datos">
                        <td><img loading="lazy" width="150" height="100" src="/imagenes/producto/<?php echo $producto->imagen; ?>"></td>
                        <td><?php echo $producto->nombre; ?></td>
                        <td class="descripcion"><?php echo $producto->descripcion; ?></td>
                        <td><?php echo $producto->tipo; ?></td>
                        <td><?php echo $producto->categoria; ?></td>
                        <td><?php echo $producto->tipoCorte; ?></td>
                        <td>
                            <a href="/admin/productos/actualizar.php?id=<?php echo $producto->id; ?>" class="boton-azul">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>