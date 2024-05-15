<script type="text/Javascript" src="javascript.js"></script>
<?php
session_start();
if (isset($_SESSION["admin"])) {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $preg = $_SESSION["preg"];
        $bd = mysqli_connect("localhost", "root", "", "varlud");
        $id = $_SESSION["ID_encuesta"];
?>
        <form action="" method="POST">
            <?php
            $sacar = mysqli_query($bd, "SELECT MIN(ID_pregunta) as 'minimo', MAX(ID_pregunta) as 'maximo' FROM preguntas where ID_encuesta = $id");
            $min = 0;
            $max = 0;
            foreach ($sacar as $data) {
                $min = $data["minimo"];
                $max = $data["maximo"];
            }
            foreach (range($min, $max) as $número) {
                echo $número;
            }
            $h = 0;
            for ($i = $min; $i <= $max; $i++) {

            ?>
                Pregunta: <input type="text" name="<?php echo 'txt' . $h; ?>"><br>
                Tipo de opciones:
                <select id="<?php echo $h; ?>" name="<?php echo 'op' . $h; ?>" onchange="generar_opcion(this.value, <?php echo $i ?>, <?php echo $h ?>)">
                    <option id="texto" value="texto">Caja de texto</option>
                    <option id="radio" value="radio">Botones radio</option>
                    <option id="check" value="check">Botones check</option>
                    <option id="select" value="select">Desplegable</option>
                </select><br>
            <?php
                $h++;
            }
            ?>
            <input type="hidden" name="cant" value="<?php echo $h; ?>">
            <input type="submit" value="Siguiente">
        </form>
            <div id=insert></div>
<?php
    } else {
       /* $bd = mysqli_connect("localhost", "root", "", "varlud");
        $id = $_SESSION["ID_encuesta"];
        $preg = $_SESSION["preg"];
        $sql = "INSERT INTO preguntas VALUES ";
        for ($i = 1; $i <= $preg; $i++) {
            $txt = $_POST["txt" . $i];
            $op = $_POST["op" . $i];

            $values = "(DEFAULT, '$id', '$op', '$txt')";
            if ($i != $preg) {
                $values = $values . ", ";
            }
            $sql = $sql . $values;

            //echo("<script>console.log('ELSE PHP: " . $txt . " , " . $op . " , " . $i ."');</script>");
        }
        $sql = $sql . ";";
        //echo("<script>console.log('BD: " . $sql ."');</script>");
        mysqli_query($bd, $sql);
        //echo "<div id=insert>";*/
    }
} else {
    header("Location: perfil.php");
}
