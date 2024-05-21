<?php
session_start();
if (isset($_SESSION["admin"])) {
    $bd = mysqli_connect("localhost", "root", "", "varlud");
    //where max(ID_pregunta)
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $preg = $_SESSION["preg"];
        $txt = 0;
        $op = 0;
        $id = $_SESSION["ID_encuesta"];
        for ($i = 0; $i < $preg; $i++) {
            $txt = $_GET["txt" . $i];
            $op = $_GET["op" . $i];
            $cant = $_GET["cant_op" . $i];
            echo "$txt <br>";
            echo "$op <br>";
            echo "$cant <br>";
            echo "$id <br>";
            //mysqli_query($bd, "INSERT INTO preguntas VALUES (DEFAULT, $id, $op, $txt)");
            ?>
            <form action="" method="POST">
                <p><?php echo $txt ?></p>
                <input type="hidden" name="<?php echo 'preg' . $i; ?>" value="<?php echo $txt ?>">
                <input type="hidden" name="<?php echo 'cant' . $i; ?>" value="<?php echo $cant ?>">
                <?php 
                for ($j = 0; $j < $cant; $j++) {
                    $txt_sin = str_replace(' ', '', trim($txt . $j));
                    echo "<br>";
                    echo $txt . $j; 
                    echo "<br>";
                    echo $txt_sin; 
                    ?>
                    <input type='text'name= "<?php echo $txt_sin; ?>">
                    <br>
                    <?php
                    }
                    
                } ?>
                <input type="submit" value="Siguiente">
            </form>
            <?php
    } else {
        //nombrar el numero de preguntas de cada una, para poder hacer el bucle
        //añadir un IF para las que no tengan opciones (texto)
        $num_preg = $_SESSION["preg"];
        //echo $num_preg . "<br>";
        for($i=0;$i<$num_preg;$i++){
            //Solo llegan cuando no hay espacios de por medio, podemos porbar a crear una variable con el contenido de la pregunta sin espacios
            $preg = str_replace(' ', '', trim($_POST["preg" . $i]));
            $cant = $_POST["cant" . $i];
            //echo $cant . "<br>";
            if($cant != 0){
                echo $preg . "<br>";
                //echo $cant . "<br>";
                for($j=0;$j < $cant; $j++){
                    $txt = $_POST[$preg . $j];
                    echo $txt;
                }
            }else{
                echo $preg . "<br>";

            }
            //$query = mysqli_query($bd, "SELECT ID_pregunta FROM preguntas WHERE nombre = $preg");
            //mysqli_query($bd, "INSERT INTO $tabla_opciones VALUES ()")
            //for(){

            //}
            }
        }
    }
