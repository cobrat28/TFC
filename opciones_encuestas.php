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
    <form action="crear_encuesta.php" method="POST">
		Nombre de la encuesta: <input type="text" name="nombre"><br>
		Número de preguntas: <input type="number" name="preg"><br>
		<input type="submit">
	</form>
<?php
}else{
    echo 'a';
}