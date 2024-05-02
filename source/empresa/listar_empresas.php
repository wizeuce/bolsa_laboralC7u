<?php
include("../../includes/head.php");
include("../../includes/conectar.php");
$conexion = conectar();
?>

<script src="<?php echo RUTAGENERAL; ?>/templates/vendor/jquery/jquery.min.js"></script>

<script>
    var ID_EMPRESA; // esta es una variable global 

    $(document).ready(function() { // inicio de jQuery
        $('#div_usuarios').dialog({
            width: 600,
            height: 400,
            title: "Lista usuarios"
        });
        $('#div_usuarios').dialog("close");
    }); // fin de jQuery

    // Función para redirigir a la página de edición con el ID de la empresa
    function f_editar(pid) {
        // Redireccionamos hacia el archivo "modificar_empresa.php" con el ID de la empresa
        window.location.href = "modificar_empresa.php?pid=" + pid;
    }

    // Función para eliminar una empresa
    function eliminarEmpresa(id) {
        if (confirm("¿Estás seguro de que deseas eliminar esta empresa?")) {
            window.location.href = "eliminar_empresa.php?id=" + id;
        }
    }

    // Función para mostrar los usuarios y asignar uno a una empresa
    function f_mostrar_usuarios(id) {
        ID_EMPRESA = id;
        $('#div_usuarios').dialog("open");
    }

    // Función para asignar un usuario a una empresa
    function f_asignar(id_usuario) {
        $.ajax({
            type: "POST",
            url: "asignar_usuario_empresa.php",
            data: {
                id_empresa: ID_EMPRESA,
                id_usuario: id_usuario
            },
            success: function(response) {
                alert(response); // Muestra el mensaje de respuesta del servidor
                location.reload(); // Recarga la página después de la asignación exitosa
            },
            error: function(xhr, status, error) {
                alert("Error al asignar usuario a la empresa: " +
                    error); // Muestra un mensaje de error si la asignación falla
            }
        });
    }


    function f_limpiar_usuario(id_empresa) {
        $.ajax({
            type: "POST",
            url: "limpiar_usuario_empresa.php",
            data: {
                id_empresa: id_empresa
            },
            success: function(response) {
                alert(response); // Muestra el mensaje de respuesta del servidor
                location.reload(); // Recarga la página después de la limpieza exitosa
            },
            error: function(xhr, status, error) {
                alert("Error al limpiar usuario de la empresa: " +
                    error); // Muestra un mensaje de error si la limpieza falla
            }
        });
    }
</script>

<!-- Begin Page Content -->
<div class="container-fluid" align="center">
    <!-- Inicio de la zona central del sistema -->
    <!-- Todo -->
    <h1>Lista de empresas</h1>

    <div class="overflow-auto shadow-sm" style="border-radius: 0.75rem/* 8px */; border: 1px solid ; border-color: #d1d5db;">
        <table class="table table-hover table-bordered mb-0">
            <tr class="table-active bg-primary text-white text-center">
                <th>RUC</th>
                <th>Razón Social</th>
                <th>Teléfono</th>
                <th>Correo Electrónico</th>
                <th>Dirección</th>
                <th>Usuario Asignado</th>
                <th>Acciones</th>
            </tr>
            <?php
            $sql = "SELECT e.*, u.nombres AS nombre_usuario, u.apellidos AS apellido_usuario FROM empresas e LEFT JOIN users u ON e.user_id = u.id";
            $registros = mysqli_query($conexion, $sql);

            while ($fila = mysqli_fetch_array($registros)) {
                echo "<tr>";
                echo "<td>" . $fila['ruc'] . "</td>";
                echo "<td>" . $fila['razon_social'] . "</td>";
                echo "<td>" . $fila['telefono'] . "</td>";
                echo "<td>" . $fila['correo'] . "</td>";
                echo "<td>" . $fila['direccion'] . "</td>";
                echo "<td>" . $fila['nombre_usuario'] . " " . $fila['apellido_usuario'] . "</td>"; // Mostrar nombre y apellido del usuario
                echo "<td>";

                // Verificar si el usuario está asignado o no
                if ($fila['user_id'] != null) {
                    // Usuario asignado, mostrar botón para quitar usuario
            ?>
                    <button onclick="f_limpiar_usuario('<?php echo $fila['id']; ?>')" type="button" class="btn btn-secondary" title="Quitar usuario"><i class="fas fa-user-slash"></i></button>
                <?php
                } else {
                    // Usuario no asignado, mostrar botón para asignar usuario
                ?>
                    <button onclick="f_mostrar_usuarios('<?php echo $fila['id']; ?>')" type="button" class="btn btn-primary" title="Agregar usuario"><i class="fas fa-user-plus"></i></button>
                <?php
                }

                // Otros botones (Editar y Eliminar) se mantienen igual
                ?>

                <button onclick="f_editar('<?php echo $fila['id']; ?>')" type="button" class="btn btn-success" title="Editar"><i class="fas fa-edit"></i></button>
                <button onclick="eliminarEmpresa('<?php echo $fila['id']; ?>')" type="button" class="btn btn-danger" title="Eliminar"><i class="far fa-trash-alt"></i></button>
                </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
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
</div>

<!-- Fin de la lista usuarios -->
<?php
include("../../includes/food.php");
?>