<?php
echo "<h1>Creación de usuario</h1>";

// Formulario para introducir recursos
echo "<form enctype='multipart/form-data' action='index.php?action=createUser&controller=controllerUser' method='POST'>
        <label for='username'>Nombre de usuario:</label>
        <input type='text' name='username' value=''><br>
        <label for='password'>Contraseña:</label><input type='password' name='password' value=''> </input></textarea><br>
        <label for='realname'>Nombre real:</label><input type='text' name='realname' value=''><br>";


// Finalizamos el formulario
echo " <input type='submit'> </form>";
