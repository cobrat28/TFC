<?php
//Destruye la sesión y reenvia a la página de inicio de sesión
session_start();
session_destroy();
header("Location: login.php");

?>