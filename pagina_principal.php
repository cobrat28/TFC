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
  <a href="Logout.php">Log out</a>
  </div>
</div>
</nav>
<?php
    session_start();

    if(isset($_SESSION["usuario"])) {
    echo "<br>";
    echo "<br><h1>Bienvenido ".$_SESSION["usuario"] ."</h1><br>";
    
?>
<?php
   }else{
   	echo "<br><h1>Hola invitado, porfavor inicia sesión para ver tus viajes y comprar billetes.</h1><br>";
?>
	<form action="Login.php">
		<input type="submit" value="Iniciar Sesión">
	</form>
<?php
 }
?>
</body>