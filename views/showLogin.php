<?php
$msg = $data[3];

if ($msg == "error_Lgn") {
        echo "<p style='color:red'>Error al iniciar sesión</p>";}
// Formulario para introducir recursos
echo "<form enctype='multipart/form-data' action='index.php?action=loginProcessor&controller=controllerUser' method='POST'>
        <label>Username</label>
        <input type='text' name='username' class='form-control' pattern='[a-zA-Z0-9]+' placeholder='Escriba aqui...' required />
   
    
        <label>Password</label>
        <input type='password' name='password' class='form-control' placeholder='Escriba aqui...' required />";

// Finalizamos el formulario
echo "<input type='submit'></form>";
