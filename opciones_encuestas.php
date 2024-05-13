<!DOCTYPE html>
<html lang="es">
<head>
    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS\estilos.css">
</head>
<body class="body_mod">
<?php
session_start();
$dni = $_SESSION["DNI"];
$_SESSION["preg"] = 0;
$bd = mysqli_connect("localhost", "root", "", "varlud");
$query = mysqli_query($bd, "SELECT * FROM usuarios WHERE DNI='$dni'");
foreach($query as $data){
    $admin = $data["admin"];
}
if ($admin == 1){
    $_SESSION["admin"]=1;
    ?>
    <form action="crear_encuesta.php" method="POST" class="form4">
		Nombre de la encuesta: <input type="text" name="nombre"><br>
		Número de preguntas: <input type="number" name="preg"><br>
		<input type="submit">
	</form>
<?php
}else{
    echo 'a';
}
?>
</body>