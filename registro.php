<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/logo.png">
	<title>Tracers</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body bgcolor="lightblue">
	<a href="Pagina_principal.php" ><img src="img/logo_tracers.png" width="150" style="text-align: center;"></a>
	<marquee behaviour="scroll" direction="right"><img src="img/avion4.png" width="100px" height="100px"></marquee>
<nav>
	<p class="opcion principal"><a href="Pagina_principal.php">Página Principal</a></p>
	<p class="opcion busca"><a href="Buscar_vuelos.php">Buscar Vuelos</a></p>
	<p class="opcion destino"><a href="Destino_sorpresa.php">Déjate llevar</a></p>
	<p class="opcion descuento"><a href="Descuentos.php">Descuentos</a></p>
	<div class="dropdown">
  <p>Personal</p>
  <div class="dropdown-content">
  <a href="Login.php">Login</a>
  <a href="Mi_perfil.php">Mi Perfil</a>
  <a href="Mis_vuelos.php">Mis Vuelos</a>
  <a href="Log_out.php">Log out</a>
  </div>
</div>
</nav>
<?php
if ($_SERVER["REQUEST_METHOD"] == "GET"){

?>

<h1>Bienvenido a Tracers, por favor introduce tus datos.</h1>
<!--formulario con todos los datos para la tabla, se vendrá al registro por GET, y al enviar el formulario, ya se énviará a la página principal-->
if ($_SERVER["REQUEST_METHOD"] == "GET"){

?>

<h1>Bienvenido a Tracers, por favor introduce tus datos.</h1>
<!--formulario con todos los datos para la tabla, se vendrá al registro por GET, y al enviar el formulario, ya se énviará a la página principal-->
<form action="" method="POST">
	Nombre: <input type="text" name="nombre"><br>
	Apellidos: <input type="text" name="ape"><br>
	DNI: <input type="text" name="dni"><br>
	Fecha nacimiento: <input type="date" name="fec_nac"><br>
	CIF de la empresa: <input type="text" name="cif"><br>
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
	$fec_nac=$_POST["fec_nac"];
	$correo=$_POST["email"];
	$passwd=password_hash($_POST["passwd"], PASSWORD_DEFAULT);


$exist=mysqli_query($bd1, "SELECT * FROM empresas where CIF='$cif'");
if (mysqli_num_rows($exist) == 0) {
	mysqli_query($bd1, "INSERT INTO empresas (CIF) VALUES ('$cif')");
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