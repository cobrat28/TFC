<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VarLud Analytics</title>
    <link rel="stylesheet" href="CSS\estilos.css">
</head>
<body class="body_print"  background-image=" src=Imagenes/Logo_grande.png ">
    <form action="Procesa_login.php" method="POST" class="form">
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
</body>
</html>
