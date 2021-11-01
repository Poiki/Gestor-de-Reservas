<?php
$consulta = $data[2][0];

echo "<h1>Modificación de time slot</h1>";

// Formulario con los datos del timeslot que se quiere modificar
echo "<form enctype='multipart/form-data' action='index.php?action=modifyTimeSlot&controller=controllerTimeSlot' method='POST'>
        <input type='hidden' name='id' value='" . $consulta['id'] . "'>
        <label for='day_of_week'>Dia de la semana</label>
        <input type='date' name='day_of_week' value='" . $consulta['day_of_week'] . "'><br>
        <label for='start_time'>Hora de inicio:</label><input type='time' name='start_time' value='" . $consulta['start_time'] . "'><br>
        <label for='end_time'>Hora de fin:</label><input type='time' name='end_time' value='" . $consulta['end_time'] . "'><br>";

// Finalizamos el formulario
echo " <input type='submit'>
    </form>";
echo "<p><a href='index.php?action=showTimeSlots&controller=controllerTimeSlot'>Volver a Time Slot</a></p>";
