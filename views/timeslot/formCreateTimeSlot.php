<?php

echo "<h1>Creación de time slot</h1>";

// Formulario con los datos del timeslot que se quiere modificar
echo "<form enctype='multipart/form-data' action='index.php?action=createTimeSlot&controller=controllerTimeSlot' method='POST'>
        <input type='hidden' name='id' value=''>
        <label for='day_of_week'>Dia de la semana</label>
        <input type='date' name='day_of_week' value=''><br>
        <label for='start_time'>Hora de inicio:</label><input type='time' name='start_time' value=''><br>
        <label for='end_time'>Hora de fin:</label><input type='time' name='end_time' value=''><br>";

// Finalizamos el formulario
echo " <input type='submit'>
    </form>";
echo "<p><a href='index.php?action=showAllTimeSlots&controller=controllerTimeSlot'>Volver a Time Slot</a></p>";
