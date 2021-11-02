<?php
$query = $data[2];
$msg = $data[3];

if ($msg == "errorRow") {
    echo "<p style='color:red'>Error. No se ha podido eliminar la row.</p>";
} else if ($msg == "errorFile") {
    echo "<p style='color:red'>Error. Se ha eliminado todos los datos excepto la fotografía.</p>";
} else if ($msg == "ok") {
    echo "<p style='color:green'>El timeslot se ha eliminado correctamente.</p>";
}
// Primero, el formulario de búsqueda
echo "<form action='index.php'>
<input type='hidden' name='action' value='buscarTimeSlot'>
<input type='search' name='textoBusqueda'>
<input type='submit' value='Buscar'>
</form><br>";

// Ahora, la tabla con los datos de las películas
echo "<table border ='1' class='table table-striped'>
<tr>
<th scope='col'>Dia de la semana</th>
<th scope='col'>Hora de inicio</th>
<th scope='col'>Hora de fin</th>
<th scope='col'>Acción 1</th>
<th scope='col'>Acción 2</th>
</tr>";

foreach ($query as $row) {
    echo "<tr>";
    echo "<td>" . $row['day_of_week'] . "</td>";
    echo "<td>" . $row['start_time'] . "</td>";
    echo "<td>" . $row['end_time'] . "</td>";
    echo "<td><a href='index.php?action=formularioModifyTimeSlot&controller=controllerTimeSlot&id=" . $row['id'] . "'>Modificar</a></td>";
    echo "<td><a href='index.php?action=deleteTimeSlot&controller=controllerTimeSlot&id=" . $row['id'] . "'>Borrar</a></td>";
    echo "</tr>";
}
echo "</table>";
echo "<button class='btn btn-primary' onclick=\"window.location.href='index.php?action=formularioCrearTimeSlot&controller=controllerTimeSlot';\">Agregar</button>";
