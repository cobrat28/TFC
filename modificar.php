<!DOCTYPE html>
<html lang="es">
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
        $correo=$dato1["correo"];
        }
?>
    <form action="Procesa_modificacion.php" method="POST" class="form">
        <div>
            <label>Nombre:</label><br>
            <input type="text" name="nombre" value="<?php echo $nombre ?>">
        </div>
        <div>
            <label>Apellidos:</label><br>
            <input type="text" name="ape" value="<?php echo $ape ?>">
        </div>
        <div>
            <label>CIF:</label><br>
            <input type="text" name="cif" value="<?php echo $cif ?>">
        </div>
        <div>
            <label>Correo:</label><br>
            <input type="text" name="correo" value="<?php echo $correo ?>">
        </div>
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
<a href='Pagina_principal.php'> Inicio. </a>

<?php } else{
    header("Location: login.html");
 } ?>
</body>
</html>
