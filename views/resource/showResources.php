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
    // Primero, el formulario de búsqueda
    echo "<form action='index.php'>
    <input type='hidden' name='action' value='buscarResource'>
    <input type='search' name='textoBusqueda'>
    <input type='submit' value='Buscar'>
    </form><br>";

    // Ahora, la tabla con los datos de las películas
    echo "<table border='1' class='table table-striped'>
    <tr>
    <th scope='col'>Nombre</th>
    <th scope='col'>Descripción</th>
    <th scope='col'>Localización</th>
    <th scope='col'>Fotografía</th>
    <th scope='col'>Acción 1</th>
    <th scope='col'>Acción 2</th>
    </tr>";

    foreach ($query as $row) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['location'] . "</td>";
        echo "<td><img src='assets/images/resources/" . $row['img'] . "' width='160' height='120'></td>";
        echo "<td><a href='index.php?action=formularioModificarResource&controller=controllerResource&idResource=" . $row['id'] . "'>Modificar</a></td>";
        echo "<td><a href='index.php?action=deleteResource&controller=controllerResource&idResource=" . $row['id'] . "'>Borrar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
