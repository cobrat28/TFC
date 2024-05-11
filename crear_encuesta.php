<!DOCTYPE html>
<html lang="es">
<head>
    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS\estilos.css">
</head>
<body class="body_print">
<?php
session_start();
if(isset($_SESSION["admin"])){
    $preg =$_POST["preg"];
    $cif = $_SESSION["CIF"];
    $nom = $_POST["nombre"];
    $_SESSION["preg"] = $_POST["preg"];
    $_SESSION["cont"] = 1;
    $bd = mysqli_connect("localhost", "root", "", "varlud");
    mysqli_query($bd, "INSERT INTO encuestas VALUES (DEFAULT, '$cif', '$nom')");
    $query = mysqli_query($bd, "SELECT * FROM encuestas WHERE nombre = '$nom'");
        foreach ( $query as $data){
            $_SESSION["ID_encuesta"] = $data["ID_encuesta"];
        }
        echo"<h1 class='form2'>Vamos a procesar tu encuesta " . $nom . " con " . $preg . " preguntas, por favor pulsa el botón de continuar.</h1>";
        ?>
        <form action="procesa_crear.php" method="GET" class="form">
            <input type="submit" value="Contiuar">
        </form>
<?php
}else{
    header("Location: perfil.php");
}
?>
</body>