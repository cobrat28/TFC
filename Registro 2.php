<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css\style.css">
</head>
<body>

    <?php
        require('encabezado.php');
        $bd = mysqli_connect("localhost","root","","PO2_PHP");

        if($_SERVER["REQUEST_METHOD"] != "POST") {
            $fechaActual = date("Y-m-d");
    ?>
        
            <form action="registro.php" method="post" class="bodyer">
                <label for='reg_email'>Email: </label>
                <input name="reg_email" type="email"><br />
                <label for='nombre'>Nombre: </label>
                <input name="nombre" type="text"><br />
                <label for='contr'>Contraseña: </label>
                <input name="contr" type="password"><br />
                <label for='nacimiento'>Fecha de nacimiento: </label>
                <input name="nacimiento" type="date" max="<?php echo $fechaActual; ?>"><br />
                <input type="submit" value="Registrar">   
            </form>
            <a href="login.php">Cancelar</a>
    
    <?php
    
        } else {

            echo "<div class=bodyer>";

                if (isset($_POST["reg_email"]) && isset($_POST["nombre"]) && isset($_POST["contr"]) && ! empty($_POST["nacimiento"])){
                    $tabla_usuarios = mysqli_query($bd, "SELECT * FROM usuarios WHERE correo LIKE '" . $_POST["reg_email"] . "'");
                    if (mysqli_num_rows($tabla_usuarios)!= 0){
                        echo "Ese usuario ya existe <br/>";
                    } else {

                        $hash_pass = password_hash("$_POST[contr]", PASSWORD_BCRYPT);

                        mysqli_query($bd, "INSERT INTO usuarios (correo , nombre , password , f_nacimiento) VALUES ('$_POST[reg_email]','$_POST[nombre]', '$hash_pass', '$_POST[nacimiento]')");
                        echo "Se ha creado el usuario";
                    } 
                } else {
                    echo "Introduce los datos necesarios.";
                } 

            echo "</div>
            <a href='registro.php'>Volver</a>";
        
        }
    ?>
</body>
</html>