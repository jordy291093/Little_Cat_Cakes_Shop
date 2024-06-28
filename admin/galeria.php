<?php
    use App\Galeria;

    require '../includes/app.php';
    autenticado();
    $galerias = Galeria::all();

    $resultado = $_GET['resultado'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
    }

    incluirTemplate('headerAdmin');
?>

    <section class="separador">
        <h2>Galería</h2>
    </section>

    <section class="contenedor agregar">
        <a class="boton-rosa" href="/admin/galeria/crear.php">Agregar Galería</a>
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
                    <th>Categoria</th>
                    <th>Acciónes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($galerias as $galeria): ?>
                    <tr class="datos">
                        <td><img loading="lazy" width="150" height="100" src="/imagenes/galeria/<?php echo $galeria->imagen; ?>"></td>
                        <td><?php echo $galeria->nombre; ?></td>
                        <td class="descripcion"><?php echo $galeria->descripcion; ?></td>
                        <td><?php echo $galeria->tipo; ?></td>
                        <td><?php echo $galeria->categoria; ?></td>
                        <td>
                            <a href="/admin/galeria/actualizar.php?id=<?php echo $galeria->id; ?>" class="boton-azul">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php
    incluirTemplate('footerAdmin');
?>