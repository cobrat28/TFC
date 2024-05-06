<?php
session_start();
$dni = $_SESSION["DNI"];
$bd = mysqli_connect("localhost", "root", "", "varlud");
$query = ($bd,"SELECT * FROM usuarios WHERE DNI = $dni");
foreach($query as $data){
    $admin = $data["admin"];
}
if ($admin = 1){
    $_SESSION["admin"]=1;
    ?>
    <form action="procesa_crear.php" method="POST">
		Nombre de la encuesta: <input type="text" name="nombre"><br>
		CIF de la empresa: <input type="text" name="cif"><br>
        Número de preguntas: <input type="number" name="preg"><br>
		<input type="submit">
	</form>
<?php
}else{
    header("Location: login.html");
}