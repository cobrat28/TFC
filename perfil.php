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
 session_start();
 if(isset($_SESSION["DNI"])){
    $bd=mysqli_connect("localhost", "root", "", "varlud");
    $dni=$_SESSION["DNI"];
    $query1=mysqli_query($bd,"SELECT * FROM usuarios WHERE DNI='$dni'");
    foreach ($query1 as $dato1){
        $nombre=$dato1["nombre"];
        $ape=$dato1["apellidos"];
        $cif=$dato1["CIF"];
        }
    $query2=mysqli_query($bd,"SELECT * FROM empresas WHERE CIF='$cif'");
    $query3=mysqli_query($bd,"SELECT count(ID_respuesta) as 'respuestas' FROM respuestas WHERE DNI='$dni' GROUP BY DNI");
    $query4=mysqli_query($bd,"SELECT count(distinct(ID_respuesta)) as 'encuestas' FROM respuestas WHERE DNI='$dni' GROUP BY ID_encuesta");
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
    echo "<h1 class='form2'>Hola $nombre, aquí tienes tus datos:</h1><br>";
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
            echo "<a href='opciones_encuestas.php'> Pulsa aquí para crear una encuesta. </a><br>";
            echo "<a href='logout.php'> Cerrar sesión. </a>";
        ?>
    </div>
    <?php
} else{
    header("Location: Login.php");
 }
 ?>
</body>