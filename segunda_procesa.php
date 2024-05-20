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
                    ?>
                    <?php echo $txt . $j . "<br>"; ?>
                    <input type='text'name= "<?php echo $txt . $j; ?>">
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
        echo $num_preg . "<br>";
        for($i=0;$i<$num_preg;$i++){
            //conseguimos solo que llegue el primer valor
            $preg = $_POST["preg" . $i];
            $cant = $_POST["cant" . $i];
            echo $preg . "<br>";
            echo $cant . "<br>";
            //$query = mysqli_query($bd, "SELECT ID_pregunta FROM preguntas WHERE nombre = $preg");
            $valor = $_POST[$preg . $i];
            echo $valor;
            //mysqli_query($bd, "INSERT INTO $tabla_opciones VALUES ()")
            //for(){

            //}
            }
        }
    }
