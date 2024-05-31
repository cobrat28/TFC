<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <link rel="stylesheet" href="CSS\estilos.css">
</head>
<body class="body_reg">
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET"){

    ?>

    <h1 class="form3">Bienvenido a VarLud Analytics.</h1>
    <!--formulario con todos los datos para la tabla, se vendrá al registro por GET, y al enviar el formulario, ya se énviará a la página principal-->
    <form action="" method="POST" class="form">
        <h2>Por favor introduce tus datos</h2>
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>
        </div>
        <div>
            <label for="ape">Apellidos:</label>
            <input type="text" id="ape" name="ape" required><br>
        </div>
        <div>
            <label for="dni">DNI:</label>
            <input type="text" id="dni" name="dni" required><br>
        </div>
        <div>
            <label for="fec_nac">Fecha de nacimiento:</label>
            <input type="date" id="fec_nac" name="fec_nac" required><br>
        </div>
        <div>
            <label for="cif">CIF de la empresa:</label>
            <input type="text" id="cif" name="cif" required><br>
        </div>
        <div>
            <label for="emp">Nombre de la empresa:</label>
            <input type="text" id="emp" name="emp" required><br>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required><br>
        </div>
        <div>
            <label for="passwd">Contraseña:</label>
            <input type="password" id="passwd" name="passwd" required><br>
        </div>
        <input type="submit" value="Enviar">
    </form>
    <?php
    }else{

        $bd1=mysqli_connect("localhost", "root", "", "varlud");
        $nombre=$_POST["nombre"];
        $ape=$_POST["ape"];
        $dni=$_POST["dni"];
        $cif=$_POST["cif"];
        $emp=$_POST["emp"];
        $fec_nac=$_POST["fec_nac"];
        $correo=$_POST["email"];
        $passwd=password_hash($_POST["passwd"], PASSWORD_DEFAULT);


    $exist=mysqli_query($bd1, "SELECT * FROM empresas where CIF='$cif'");
    if (mysqli_num_rows($exist) == 0) {
        mysqli_query($bd1, "INSERT INTO empresas (CIF, nombre) VALUES ('$cif', '$emp')");
    }else{

    }
    mysqli_query($bd1, "INSERT INTO login (correo, contraseña) values ('$correo', '$passwd')");

    mysqli_query($bd1, "INSERT INTO usuarios (nombre, apellidos, fecha_nac, correo, DNI, CIF)
    VALUES ('$nombre', '$ape', '$fec_nac', '$correo', '$dni', '$cif')");

    header("Location: pagina_principal.php");
    }
    ?>
</body>
</html>