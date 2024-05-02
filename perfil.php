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
    foreach ($query2 as $dato2){
        $emp=$dato1["nombre"];
        }
    foreach ($query3 as $dato3){
        $pre=$dato3["respuestas"];
        }
    foreach ($query4 as $dato4){
        $enc=$dato34["encuestas"];
        }
    echo "<h1>Hola $nombre, aquí tienes tus datos:</h1><br>";
    echo "Nombre: $nombre <br>";
    echo "Apellidos: $ape <br>";
    echo "DNI: $dni <br>";
    echo "Empresa: $emp <br>";
    echo "Encuestas respondidas: $enc <br>";
    echo "Preguntas respondidas: $pre <br>";    
    echo "<a href='modificar.php'> Pulsa aquí para modificar tus datos. </a>";
} else{
    header("Location: Login.php");
 }