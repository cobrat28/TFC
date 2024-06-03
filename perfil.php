<!--Esta página muestra la información del perfil del usuario, dándole una bienvenida y mostrándole después su nombre y apellidos, su DNI, su empresa
las encuestas que ha respondido, y las preguntas totales respondidas. Aparte muestra un enlace para modificar datos que redirige a la página de 
modificación, otro que muestra los resultados de las encuestas pero solo a los administradores, y un último para cerrar sesión-->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <link rel="stylesheet" href="CSS\estilos.css">
</head>
<body class="body_print">
<?php

include 'encabezado.php';
//Aquí se establece la conexión con la base de datos donde se extrae el usuario mediante el DNI para cargar su página de perfil
session_start();
if(isset($_SESSION["DNI"])){
    $bd=mysqli_connect("localhost", "root","", "varlud");
    $dni=$_SESSION["DNI"];
    $query1=mysqli_query($bd,"SELECT * FROM usuarios WHERE DNI='$dni'");
    foreach ($query1 as $dato1){
        $nombre=$dato1["nombre"];
        $ape=$dato1["apellidos"];
        $cif=$dato1["CIF"];
        }
    $query2=mysqli_query($bd,"SELECT * FROM empresas WHERE CIF='$cif'");
    $query3=mysqli_query($bd,"SELECT count(ID_respuesta) as 'respuestas' FROM respuestas WHERE DNI='$dni' GROUP BY DNI");
    $query4=mysqli_query($bd,"SELECT count(distinct(ID_encuesta)) as 'encuestas' FROM respuestas WHERE DNI='$dni'");
    $pre=0;
    $enc=0;
    foreach ($query2 as $dato2){
        $emp=$dato2["nombre"];
        }
    foreach ($query3 as $dato3){
        $pre=$dato3["respuestas"];
        }
    foreach ($query4 as $dato4){
        $enc=$dato4["encuestas"];
        }
    //Aguí se muestran los datos del usuario, los tres últimos campos son los enlaces para modificar, ver los datos de las encuestas y el de cerrar sesión
    echo "<h1 class='form5'>Hola $nombre, aquí tienes tus datos:</h1><br>";
    ?>
    <div class="form">
        <?php
            echo "Nombre: $nombre <br>";
            echo "Apellidos: $ape <br>";
            echo "DNI: $dni <br>";
            echo "Empresa: $emp <br>";
            echo "Encuestas respondidas: $enc <br>";
            echo "Preguntas respondidas: $pre <br>";    
            echo "<a href='modificar.php'> Pulsa aquí para modificar tus datos. </a><br>";
            echo "<a href='resultados.php'> Pulsa aquí para ver resultados de las encuestas (Solo administración). </a><br>";
            echo "<a href='logout.php'> Cerrar sesión. </a>";
        ?>
    </div>
    <?php
} else{
    header("Location: login.php");
 }
 ?>
</body>