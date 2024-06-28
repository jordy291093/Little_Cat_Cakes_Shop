<?php
    use App\Temporada;
    
    require '../includes/app.php';
    autenticado();

    $temporadas = Temporada::all();

    $resultado = $_GET['resultado'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
    }

    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Temporada</h2>
    </section>

    <section class="contenedor agregar">
        <a class="boton-rosa" href="/admin/temporada/crear.php">Agregar Temporada</a>
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
                    <th>Categoria</th>
                    <th>Acciónes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($temporadas as $temporada): ?>
                    <tr class="datos">
                        <td><img loading="lazy" width="150" height="100" src="/imagenes/temporada/<?php echo $temporada->imagen; ?>"></td>
                        <td><?php echo $temporada->nombre; ?></td>
                        <td class="descripcion"><?php echo $temporada->descripcion; ?></td>
                        <td><?php echo $temporada->tipo; ?></td>
                        <td>
                            <a href="/admin/temporada/actualizar.php?id=<?php echo $temporada->id; ?>" class="boton-azul">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>