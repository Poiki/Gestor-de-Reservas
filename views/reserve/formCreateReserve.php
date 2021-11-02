<?php
$queryResource = $data[2][0];
$queryTimeSlot = $data[2][1];
echo "<h1>Creación de Reserva</h1>";

// Formulario con los datos del timeslot que se quiere modificar
echo "<form enctype='multipart/form-data' action='index.php?action=createReserve&controller=controllerReserve' method='POST'>
        <label for='resource'>Recurso: </label>
        <select class='form-select' name='idResource'>";
foreach ($queryResource as $row) {
    echo "<option value= '" . $row['id'] . "'> " . $row['name'] . "</option>";
}

echo "       </select>
        <br><label for='timeSlot'>Hora: </label><select class='form-select' name='idTimeSlot'>";
foreach ($queryTimeSlot as $row) {
    echo "<option value= '" . $row['id'] . "'> " . $row['day_of_week'] . " --- " . $row['start_time'] . " - " . $row['end_time'] . " </option>";
}
echo "       </select><br>
        <label for='note'>Nota:</label>
        <textarea class='form-control' name='note' id='note' rows='4' placeholder='Escribe aquí...'></textarea>
        
        ";

// Finalizamos el formulario
echo " <input type='submit'>
    </form>";
echo "<p><a href='index.php?action=showAllTimeSlots&controller=controllerTimeSlot'>Volver a Reservas</a></p>";
