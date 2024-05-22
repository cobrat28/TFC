<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <link rel="stylesheet" href="CSS\estilos.css">
</head>
<body class="body_ses">
<?php
session_start();
if(isset($_SESSION["admin"])){
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $preg = $_SESSION["preg"];
        $bd = mysqli_connect("localhost", "root", "", "varlud");
        $id = $_SESSION["ID_encuesta"];
        for($i=0; $i < $preg; $i++){
            //revisar action y method
            ?>
            <form action="procesa_crear_dos.php" method = "GET">
            Pregunta: <input type="text" name="<?php echo 'txt' . $i; ?>"><br>
                Tipo de opciones:
                <select id="<?php echo $h; ?>" name="<?php echo 'op' . $i; ?>">
                    <option id="texto" value="texto">Caja de texto</option>
                    <option id="radio" value="radio">Botones radio</option>
                    <option id="check" value="check">Botones check</option>
                    <option id="select" value="select">Desplegable</option>
                </select><br>
            Cantidad de opciones (si procede): <input type="number" name="<?php echo 'cant_op' . $i; ?>"><br>
            <?php
        }
        ?>
        
        <input type="submit" value="Siguiente">
    </form>
    <?php
    }

}else{
    header("Location: perfil.php");
}
?>
</body>
</html>
