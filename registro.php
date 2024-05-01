<!DOCTYPE html>
<html lang="es">
<head>
</head>
<body class="body_print">
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET"){

    ?>
    
    <h1>Bienvenido a VarLud Analytics, por favor introduce tus datos.</h1>
    <!--formulario con todos los datos para la tabla, se vendrá al registro por GET, y al enviar el formulario, ya se énviará a la página principal-->
    <form action="" method="POST">
        Nombre: <input type="text" name="nombre"><br>
        Apellidos: <input type="text" name="ape"><br>
        DNI: <input type="text" name="dni"><br>
        Fecha nacimiento: <input type="date" name="fec_nac"><br>
        CIF de la empresa: <input type="text" name="cif"><br>
        Nombre de la empresa: <input type="text" name="emp"><br>
        Email: <input type="text" name="email"><br>
        Contraseña: <input type="password" name="passwd"><br>
        <input type="submit" name="Enviar">
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
    mysqli_query($bd1, "INSERT INTO Login (correo, contraseña) values ('$correo', '$passwd')");
    
    mysqli_query($bd1, "INSERT INTO Usuarios (nombre, apellidos, fecha_nac, correo, DNI, CIF)
    VALUES ('$nombre', '$ape', '$fec_nac', '$correo', '$dni', '$cif')");
    
    header("Location: Pagina_principal.php");
    }
    ?>
</body>
</html>
