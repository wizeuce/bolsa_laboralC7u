<?php
include("../../includes/head.php");
include("../../includes/conectar.php");
$conexion = conectar();
?>

<script src="<?php echo RUTAGENERAL;?>/templates/vendor/jquery/jquery.min.js"></script>

<script>
    var ID_EMPRESA; // esta es una variable global 

    $(document).ready(function () { // inicio de jQuery
        $('#div_usuarios').dialog({
            width: 600,
            height: 400,
            title: "Lista usuarios"
        });
        $('#div_usuarios').dialog("close");

        $('#buscar').on('input', function () {
            var searchTerm = $(this).val().toLowerCase();
            $('table tbody tr').each(function () {
                var title = $(this).find('td:eq(0)').text().toLowerCase();
                if (title.includes(searchTerm)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
    }); // fin de jQuery

    // Función para redirigir a la página de edición con el ID de la empresa
    function f_editar(pid) {
        // Redireccionamos hacia el archivo "modificar_empresa.php" con el ID de la empresa
        window.location.href = "modificar_oferta.php?pid=" + pid;
    }

    // Función para eliminar una empresa
    function eliminarOferta(id) {
        if (confirm("¿Estás seguro de que deseas eliminar esta oferta?")) {
            window.location.href = "eliminar_oferta.php?id=" + id;
        }
    }
    function f_postular(id) {
        if(confirm("Se va postular esta oferta, desea continuar?")){
            window.location.href = "postular_oferta.php?id=" + id;
          
        }
    }
</script>

<!-- Begin Page Content -->
<div class="container-fluid" align="center">
    <!-- Inicio de la zona central del sistema -->
    <!-- Todo -->
    <h1>Lista de ofertas</h1>

    <!-- Agrega el campo de búsqueda -->
    <div class="form-group">
        <label for="buscar">Buscar por nombre:</label>
        <input type="text" class="form-control" id="buscar" placeholder="Ingrese el nombre">
    </div>

    <!-- Tabla de ofertas -->
    <table class="table table-hover table-bordered">
        <tr class="table-active">
            <th>Título</th>
            <th>Descripción</th>
            <th>Fecha Publicación</th>
            <th>Fecha Cierre</th>
            <th>Remuneracion</th>
            <th>Ubicacion</th>
            <th>Tipo</th>
            <th>Empresa</th>
            <th>Acciones</th>
        </tr>
        <?php
        $sql = "SELECT * FROM oferta_laborals";
        $registros = mysqli_query($conexion, $sql);

        while ($fila = mysqli_fetch_array($registros)) {
            echo "<tr>";
            echo "<td>" . $fila['titulo'] . "</td>";
            echo "<td>" . $fila['descripcion'] . "</td>";
            echo "<td>" . $fila['fecha_publicacion'] . "</td>";
            echo "<td>" . $fila['fecha_cierre'] . "</td>";
            echo "<td>" . $fila['remuneracion'] . "</td>";
            echo "<td>" . $fila['ubicacion'] ."</td>";
            echo "<td>" . $fila['tipo'] ."</td>";
            echo "<td>" . $fila['empresa_id'] ."</td>";
            echo "<td>";
        ?>
        <button type="button" class="btn btn-primary" onclick="f_editar('<?php echo $fila['id']; ?>')">Editar</button>

        <button type="button" class="btn btn-danger" onclick="eliminarOferta('<?php echo $fila['id']; ?>')">Eliminar</button>
       
        <button type="button" class="btn btn-success" onclick="f_postular('<?php echo $fila['id']; ?>')">Postular</button>

        <?php
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

<!-- Lista de usuarios -->
<div id="div_usuarios" style="display: none;">
    <h1>Lista de usuarios</h1>

    <?php
    // Consulta para obtener la lista de usuarios que no son responsables de ninguna empresa
    $sql_usuarios = "SELECT * FROM users WHERE id NOT IN (SELECT DISTINCT user_id FROM empresas WHERE user_id IS NOT NULL)";
    $registros_usuarios = mysqli_query($conexion, $sql_usuarios);

    // Verificar si hay algún error en la consulta
    if (!$registros_usuarios) {
        echo "Error al obtener la lista de usuarios: " . mysqli_error($conexion);
    } else {
        // Verificar si se encontraron usuarios
        if (mysqli_num_rows($registros_usuarios) > 0) {
            // Mostrar la lista de usuarios
            while ($fila_user = mysqli_fetch_array($registros_usuarios)) {
                echo '<a href="#" onclick="f_asignar(' . $fila_user['id'] . ')">';
                echo $fila_user['dni'] . ' --- ' . $fila_user['nombres'] . ' ---- ' . $fila_user['apellidos'] . '<br>';
                echo '</a>';
            }
        } else {
            echo "No se encontraron usuarios disponibles.";
        }
    }
    ?>

    <button type="button" class="btn btn-primary" onclick="f_limpiar_usuario(ID_EMPRESA)">Limpiar
        usuario</button>
</div>

<!-- Fin de la lista usuarios -->
<?php
include("../../includes/food.php");
?>
