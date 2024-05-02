<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VarLud Analytics</title>
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
            <p> <?php echo $nombre ?> </p><br>
            <input type="text" name="nombre">
        </div>
        <div>
            <label>Apellidos:</label><br>
            <p> <?php echo $ape ?> </p><br>
            <input type="text" name="ape">
        </div>
        <div>
            <label>CIF:</label><br>
            <p> <?php echo $cif ?> </p><br>
            <input type="text" name="cif">
        </div>
        <div>
            <label>Correo:</label><br>
            <p> <?php echo $correo ?> </p><br>
            <input type="text" name="correo">
        </div>
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
<a href='Pagina_principal.php'> Inicio. </a>

<?php } else{
    header("Location: Login.php");
 } ?>
</body>
</html>
