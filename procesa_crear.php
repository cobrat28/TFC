<?php
session_start();
if(isset($_SESSION["admin"])){
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $preg = $_SESSION["preg"];
        ?>
        <form action="" method = "POST">
        <?php
        for($i=1; $i<$preg; $i++){
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
        echo 'SeSaltaElAnterior';
        $bd = mysqli_connect("localhost", "root", "", "varlud");
        $i = intval($_POST["cant"]);
        $id = $_SESSION["ID_encuesta"];
        for($h=1; $h<$i; $h++){
            $txt = $_POST["txt" . $h];
            $op = $_POST["op" . $h];
          mysqli_query($bd, "INSERT INTO preguntas VALUES (DEFAULT, '$id', '$op', '$txt')");
        }
    }

}else{
    header("Location: perfil.php");
}