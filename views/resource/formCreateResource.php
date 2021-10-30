<?php
echo "<h1>Creación de usuario</h1>";

// Formulario para introducir recursos
echo "<form enctype='multipart/form-data' action='index.php?action=createResource&controller=controllerResource' method='POST'>
        <label for='name'>Nombre:</label>
        <input type='text' name='name' value=''><br>
         <label for='description'>Descripción:</label><br /><textarea name='description' rows='6' cols='70'></textarea><br>
        <label for='location'>Localización:</label><input type='text' name='location' value=''><br>
        <label for='img'>Fotografía:</label><input type='file' name='img'><br>";


// Finalizamos el formulario
echo " <input type='submit'> </form>";