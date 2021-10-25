<?php
echo "<h1>Eliminación de recursos</h1>";

if (isset($data['php'])) {
    echo "<p style='color:red'>" . $data['errorMsg'] . "</p>";
}

if (isset($data['infoMsg'])) {
    echo "<p style='color:blue'>" . $data['infoMsg'] . "</p>";
}
