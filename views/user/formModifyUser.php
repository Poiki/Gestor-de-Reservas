<?php
$consulta = $data[2][0];

echo "<h1>Modificación de usuarios</h1>";

// Formulario con los datos del usuario que se quiere modificar
echo "<form enctype='multipart/form-data' action='index.php?action=modifyUser&controller=controllerUser' method='POST'>
        <input type='hidden' name='id' value='" . $consulta['id'] . "'>
        <label for='username'>Nombre:</label>
        <input type='text' name='username' value='" . $consulta['username'] . "'><br>
        <label for='password'>Contraseña:</label><input name='password' type='password' value='" . $consulta['password'] . "'></input><br>
        <label for='realname'>Nombre real:</label><input type='text' name='realname' value='" . $consulta['realname'] . "'><br>";

// Finalizamos el formulario
echo " <input type='submit'>
    </form>";
echo "<p><a href='index.php?action=showAllUsers&controller=controllerUser'>Volver a User</a></p>";
