<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Gestor de Reservas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="assets/bootstrap.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <header class="modal-header">
        <div class="bs-component">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarColor01">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=showAllResources&controller=controllerResource">Recursos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=showAllTimeSlots&controller=controllerTimeSlot">Horario</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=showAllUsers&controller=controllerUser">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?action=showAllReserves&controller=controllerReserve">Reservas</a>
                            </li>
                    </div>
                    </ul>
                </div>
        </div>
        </nav>
        </div>
        <div>
            <br>
            <?php
            if (Security::thereIsSession()) {
                echo "<p>Id del usuario: " . Security::getUserId() . "</p>";
                echo "<button type='button' class='btn btn-primary' onclick=\"window.location.href='index.php?action=closeSession&controller=controllerUser';\">Cerrar sesión</button>";
            } else {
                echo "<button type='button' class='btn btn-primary' onclick=\"window.location.href='index.php?action=showLogin';\">Login</button>";
            }
            ?>
        </div>


    </header>