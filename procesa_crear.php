<?php
session_start();
if(isset($_SESSION["admin"])){
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $preg = $_SESSION["preg"];
        ?>
        <form action="" method = "POST">
        <?php
        for($i=1; $i<=$preg; $i++){
            ?>
            Pregunta: <input type="text" name="<?php echo 'txt' . $i;?>"><br>
            Tipo de opciones:
            <select id="<?php echo $i;?>" name="<?php echo 'op' . $i;?>">
                <option value="texto">Caja de texto</option>
                <option value="radio">Botones radio</option>
                <option value="check">Botones check</option>
                <option value="select">Desplegable</option>
            </select><br>
        <?php
        }
            ?>
            <input type="hidden" name="cant" value="<?php echo $i;?>">
            <input type="submit" value="Siguiente">
            </form>
            <?php
    }else{
        $bd = mysqli_connect("localhost", "root", "", "varlud");
        $id = $_SESSION["ID_encuesta"];
        $preg = $_SESSION["preg"];
        $sql = "INSERT INTO preguntas VALUES ";
        for($i=1; $i<=$preg; $i++){
            $txt = $_POST["txt" . $i];
            $op = $_POST["op" . $i];

            $values = "(DEFAULT, '$id', '$op', '$txt')";
            if($i != $preg){
                $values = $values . ", ";
            }
            $sql = $sql . $values;

            //echo("<script>console.log('PHP: " . $txt . " , " . $op . " , " . $i ."');</script>");
        }
        $sql = $sql . ";";
        //echo("<script>console.log('BD: " . $sql ."');</script>");
        mysqli_query($bd, $sql);
    }

}else{
    header("Location: perfil.php");
}