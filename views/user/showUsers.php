<?php
$query = $data[2];
$msg = $data[3];

if ($msg == "errorRow") {
    echo "<p style='color:red'>Error. No se ha podido eliminar la row.</p>";
} else if ($msg == "errorFile") {
    echo "<p style='color:red'>Error. Se ha eliminado todos los datos excepto la fotografía.</p>";
} else if ($msg == "ok") {
    echo "<p style='color:green'>El usuario se ha eliminado correctamente.</p>";
}


// Primero, el formulario de búsqueda
echo "<form action='index.php'>
    <input type='hidden' name='action' value='buscarUser'>
    <input type='search' name='textoBusqueda'>
    <input type='submit' value='Buscar'>
    </form><br>";

// Ahora, la tabla con los datos de los usuarios
echo "<table border ='1' class='table table-striped'>
    <tr>
    <th scope='col'>Usuario</th>
    <th scope='col'>Contraseña</th>
    <th scope='col'>Nombre real</th>
    <th scope='col'>Acción 1</th>
    <th scope='col'>Acción 2</th>
    </tr>";

foreach ($query as $row) {
    echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>" . $row['realname'] . "</td>";
    echo "<td><a href='index.php?action=formularioModifyUser&controller=controllerUser&id=" . $row['id'] . "'>Modificar</a></td>";
    echo "<td><a href='index.php?action=deleteUser&controller=controllerUser&id=" . $row['id'] . "'>Borrar</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "<button class='btn btn-primary' onclick=\"window.location.href='index.php?action=formCreateUser&controller=controllerUser';\">Agregar</button>";
