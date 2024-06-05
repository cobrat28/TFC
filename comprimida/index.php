<!--Esta página está destinada al inicio de sesión de un usuario que ya esté registrado en nuestra web.
Se compone de un campo donde hay que introducir el correo electrónico, otro campo para la contraseña y
un botón de envío el cual al pulsarlo te redirige a la página de procesamiento que comprueba si los datos
introducidos en la base de datos, si to trae al usuario de vuelta a esta página-->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <link rel="stylesheet" href="CSS\estilos.css">
</head>

<body class="body_ses">
    
    <?php
    session_start();
    if (isset($_SESSION["error"])) {
        ?>
        <script>
            alert("Introduce un usuario registrado para iniciar sesión.");
        
    </script>
    <?php
    }
    ?>
    <div class="form">
        <form action="procesa_login.php" method="POST">
            <h2>Iniciar sesión</h2>
            <div>
                <label for="email">Correo:</label><br>
                <input type="text" id="email" name="email" required>
            </div>
            <div>
                <label for="passwd">Contraseña:</label><br>
                <input type="password" id="passwd" name="passwd" required>
            </div>
            <br>
            <input type="submit" value="Iniciar sesión">
        </form>
        <!--Este enlace es una redirección a la página de registro por si el usuario aún no está registrado en nuestra web-->
        <p><a href="registro.php">Si no tienes usuario, pincha aquí para crearlo.</a></p>
    </div>
</body>

</html>