<?php 
echo "<h1>Modificación de recursos</h1>";

echo "<form action = 'index.php' method = 'get'>
                    Título:<input type='text' name='name' value='$name->Nombre'><br>
                    Género:<input type='textarea' name='description' value='$description->Descripcion'><br>
                    País:<input type='text' name='pais' value='$location->Localizacion'><br>
                    Cartel:<input type='file' name='img'><br>
                    <img src='images/" . $img->Imagen . "' width='100' align='center'><br>";




