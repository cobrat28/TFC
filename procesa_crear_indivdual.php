<?php
session_start();
if(isset($_SESSION["admin"])){
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $preg = $_SESSION["preg"];
        $cont = $_SESSION["cont"];
        if($cont <= $preg){
            ?>
            <form action="" method = "POST">
            Pregunta: <input type="text" name="txt"><br>
            Tipo de opciones:
            <select name="opcion">
                <option value="texto">Caja de texto</option>
                <option value="radio">Botones radio</option>
                <option value="check">Botones check</option>
                <option value="select">Desplegable</option>
            </select><br>
            Cantidad de opciones (si procede): <input type="number" name="cant_op"><br>
            <input type="submit" value="Siguiente">
        </form>
        <?php
        }
    }else{
        $bd = mysqli_connect("localhost", "root", "", "varlud");
        $id = $_SESSION["ID_encuesta"];
        mysqli_query($bd, "INSERT INTO preguntas VALUES (DEFAULT, '$id', '$op', '$txt')");
    }

}else{
    header("Location: perfil.php");
}