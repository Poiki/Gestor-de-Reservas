<?php
$consulta = $data[2][0];

echo "<h1>Modificación de recurso</h1>";

// Formulario con los datos del recurso que se quiere modificar
echo "<form enctype='multipart/form-data' action='index.php?action=modificarResource&controller=controllerResource' method='POST'>
        <input type='hidden' name='idResource' value='" . $consulta['id'] . "'>
        <label for='name'>Nombre:</label>
        <input type='text' name='name' value='" . $consulta['name'] . "'><br>
        <label for='description'>Descripción:</label><br /><textarea name='description' rows='6' cols='70'>". $consulta['description'] . "</textarea><br>
        <label for='location'>Localización:</label><input type='text' name='location' value='" . $consulta['location'] . "'><br>
        <label for='img'>Fotografía:</label><input type='file' name='img'><br>
        <img src='assets/images/resources/" . $consulta['img'] . "' width='160' height='120'><br>";

// Finalizamos el formulario
echo " <input type='submit'>
    </form>";
echo "<p><a href='index.php?action=showAllResources&controller=controllerResource'>Volver a Resources</a></p>";