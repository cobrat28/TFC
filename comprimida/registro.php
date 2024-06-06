<!--En esta página se le muestra al usuario un formulario para que se pueda registrar en nuestra web con los campos de
nombre, apellidos, DNI, CIF de la empresa, Fecha de nacimiento, Email y contraseña-->

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <link rel="stylesheet" href="CSS\estilos.css">
    <!--Esta parte es para definir las restricciones como que el DNI tenga 8 números y una letra, que el nombre sean solo letras...-->
    <script>
        function validarFormulario() {
            const nombre = document.getElementById('nombre').value;
            const ape = document.getElementById('ape').value;
            const dni = document.getElementById('dni').value;
            const fec_nac = new Date(document.getElementById('fec_nac').value);
            const cif = document.getElementById('cif').value;
            const email = document.getElementById('email').value;
            const passwd = document.getElementById('passwd').value;

            const hoy = new Date();
            const edad = hoy.getFullYear() - fec_nac.getFullYear();
            const mes = hoy.getMonth() - fec_nac.getMonth();
            if (edad > 100) {
                alert("La edad no puede ser mayor de 100 años.");
                return false;
            }

            if (!/^[a-zA-Z]+$/.test(nombre)) {
                alert("El nombre no puede contener números.");
                return false;
            }

            if (!/^[a-z A-Z]+$/.test(ape)) {
                alert("El apellido no puede contener números.");
                return false;
            }

            const dniRegex = /^[0-9]{8}[A-Za-z]$/;
            if (!dniRegex.test(dni)) {
                alert("El DNI debe tener 8 números seguidos de una letra.");
                return false;
            }

            const cifRegex = /^[A-Za-z]{1}[0-9]{8}$/;
            if (!cifRegex.test(cif)) {
                alert("El CIF debe tener una letra seguida de 8 números.");
                return false;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("La dirección de email no es válida.");
                return false;
            }

            const passwdRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
            if (!passwdRegex.test(passwd)) {
                alert("La contraseña debe tener al menos 8 caracteres, incluir al menos una letra y un número.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body class="body_reg">
<?php

if ($_SERVER["REQUEST_METHOD"] == "GET"){

    ?>

    <h1 class="form3">Bienvenido a VarLud Analytics.</h1>
    <!--formulario con todos los datos para la tabla, se llegará al registro por GET, y al enviar el formulario, ya se énviará a la página principal-->
    <form action="" method="POST" class="form" onsubmit="return validarFormulario()">
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

        $bd1=mysqli_connect("localhost", "root","", "varlud");
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