<!--Esta página se compone de un formulario que se le proporciona al usuario en caso de que haya cambiado por x motivo alguno de sus datos. Se compone
de los campos de Nombre, Apellidos, CIF y correo, con un botón de iniciar sesión que actualiza los datos y un enlace para la página principál-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <link rel="stylesheet" href="CSS\estilos.css">
</head>
<body class="body_mod">
<?php
//Aquí se hace la conexión a la base de datos donde se recuperan las filas que coincidan con el DNI del usuario
 session_start();
 if(isset($_SESSION["DNI"])){
    $bd=mysqli_connect("localhost", "root","", "varlud");
    $dni=$_SESSION["DNI"];
    $query1=mysqli_query($bd,"SELECT * FROM usuarios WHERE DNI='$dni'");
    foreach ($query1 as $dato1){
        $nombre=$dato1["nombre"];
        $ape=$dato1["apellidos"];
        $cif=$dato1["CIF"];
        $correo=$dato1["correo"];
        }
?>
<!--Aquí es donde se muestran los campos del formulario al usuario-->
    <form action="procesa_modificacion.php" method="POST" class="form4">
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
        <!--Aquí está el botón de actualizar y mas abajo el enlace para volver a la página principal. Cuando se pulsa en el botón de actualizar se envian los
    datos a la página que procesa la modificación.-->
        <input type="submit" value="Actualizar">
    </form>

<a href='pagina_principal.php' class="form9"> Inicio. </a>

<?php } else{
    header("Location: index.php");
 } ?>
</body>
</html>
