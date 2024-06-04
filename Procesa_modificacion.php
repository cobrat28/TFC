<?php 
//En esta página es donde se actualizan los datos del usuario, se actualiza cada campo mediante sentencias SQL
session_start();
$bd=mysqli_connect("localhost", "root","", "varlud");
if (isset($_POST["nombre"], $_POST["ape"], $_POST["correo"], $_POST["cif"], $_SESSION["DNI"])) {
    $nombre=$_POST["nombre"];
    $apellidos=$_POST["ape"];
    $correo_nuevo=$_POST["correo"];
    $cif_nuevo=$_POST["cif"];
    $correo=$_SESSION["correo"];
    $cif=$_SESSION["CIF"];
    $dni=$_SESSION["DNI"];
    mysqli_query($bd, "UPDATE login SET correo = '$correo_nuevo' WHERE correo = '$correo'");
    mysqli_query($bd, "UPDATE empresas SET cif = '$cif_nuevo' WHERE cif = '$cif'"); 
    mysqli_query($bd, "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', CIF = '$cif' WHERE DNI = '$dni'"); 
    header("location: perfil.php");
}else{
    header("location: index.php");
}
