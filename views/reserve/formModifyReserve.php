<?php
$consulta = $data[2][0];

echo "<h1>Modificación de reserva</h1>";

// Formulario con los datos del recurso que se quiere modificar
echo "<form enctype='multipart/form-data' action='index.php?action=modifyReserve&controller=controllerReserve' method='POST'>
        <input type='hidden' name='idReserve' value='" . $consulta['id'] . "'>
        <label for='name'>Id del Recurso:</label>
        <input type='text' name='id_resource' value='" . $consulta['id_resource'] . "'><br>
        <label for='id_user'>Id del usuario:</label><br /><input name='id_user' value='" . $consulta['id_user'] . "'></input><br>
        <label for='id_timeslot'>Id del horario:</label><input type='text' name='id_timeslot' value='" . $consulta['id_timeslot'] . "'><br>
        <label for='id_user'>Notas:</label><br><textarea type='text' name='note' rows='6' cols='70'>" . $consulta['note'] . "</textarea><br>";

// Finalizamos el formulario
echo " <input type='submit'>
    </form>";
echo "<p><a href='index.php?action=showAllReserves&controller=controllerReserve'>Volver a Reservas</a></p>";
