<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/logo.png">
	<title>Login</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body bgcolor="lightblue">
	<a href="Pagina_principal.php" ><img src="img/logo_tracers.png" width="150" style="text-align: center;"></a>
	<marquee behaviour="scroll" direction="right"><p>PRUEBA</p></marquee>
<?php
session_start();
    if(!isset($_SESSION["usuario"])) {
?>
	<div id="Inicia">
	<form action="Procesa_login.php" method="POST">
		Email: <input type="email" name="email"><br>
		Contraseña: <input type="password" name="clave"><br>
		<input type="submit">
	</form>
</div> 
<?php
	}else{
		$login=$_SESSION["usuario"];
		$dni=$_SESSION["DNI"];
?>
<div id="Iniciado">
	<form action="Logout.php">
		<?php echo "Sesión iniciada como $login <br>"; ?>
		<input type="submit" value="Cerrar Sesión">

	</form>
</div>
<?php
	}
?>
<div>
	<form action="Registro.php">
		<input type="submit" value="Registrarse">
</div>
<a href="Recordar.php">¿Has olvidado tu constraseña?</a>
</body>
</html>