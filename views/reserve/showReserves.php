<div id="msg">

    <?php
    $query = $data[2];
    $msg = $data[3];

    if ($msg == "errorRow") {
        echo "<p style='color:red'>Error al realizar la consulta.</p>";
    } else if ($msg == "errorFile") {
        echo "<p style='color:red'>Error relacionado con el fichero.</p>";
    } else if ($msg == "ok_d") {
        echo "<p style='color:green'>El recurso se ha eliminado correctamente.</p>";
    } else if ($msg == "ok_m") {
        echo "<p style='color:green'>El recurso se ha modificado correctamente.</p>";
    } elseif ($msg == "ok_c") {
        echo "<p style='color:green'>El recurso se ha creado correctamente.</p>";
    }

    echo "</div>";

    // Ahora, la tabla con los datos de los recursos
    echo "<table border='1' class='table'>
    <tr>
    <th scope='col'>Nombre</th>
    <th scope='col'>Usuario</th>
    <th scope='col'>Dia</th>
    <th scope='col'>Hora de inicio</th>
    <th scope='col'>Hora de fin</th>
    <th scope='col'>Notas</th>
    <th scope='col'>Accion 1</th>
    <th scope='col'>Accion 2</th>
    </tr>";

    foreach ($query as $row) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['day_of_week'] . "</td>";
        echo "<td>" . $row['start_time'] . "</td>";
        echo "<td>" . $row['end_time'] . "</td>";
        echo "<td>" . $row['note'] . "</td>";
        echo "<td><a href='index.php?action=formModifyReserve&controller=controllerReserve&idReserve=" . $row['id'] . "'>Modificar</a></td>";
        echo "<td><a href='index.php?action=deleteReserve&controller=controllerReserve&idReserve=" . $row['id'] . "'>Borrar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<button class='btn btn-primary' onclick=\"window.location.href='index.php?action=formCreateReserve&controller=controllerReserve';\">Agregar</button>";
