<?php
session_start();
if (isset($_SESSION["admin"])) {
    $bd = mysqli_connect("localhost", "root", "", "varlud");
    $id_enc = $_SESSION["ID_encuesta"];
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
            /*
            echo "$txt <br>";
            echo "$op <br>";
            echo "$cant <br>";
            echo "$id <br>";*/
            $pru = "INSERT INTO preguntas VALUES (DEFAULT, $id, '$op', '$txt')";
            //echo $pru;
            mysqli_query($bd, $pru);
            //hacer if para cazar los cant de text
?>
            <form action="" method="POST">
                <p><?php echo $txt ?></p>
                <input type="hidden" name="<?php echo 'preg' . $i; ?>" value="<?php echo $txt ?>">
                <input type="hidden" name="<?php echo 'cant' . $i; ?>" value="<?php echo $cant ?>">
                <?php
                if ($op != 'texto') {
                    for ($j = 0; $j < $cant; $j++) {
                        $txt_sin = str_replace(' ', '', trim($txt . $j));
                        /*
                        echo "<br>";
                        echo $txt . $j;
                        echo "<br>";
                        echo $txt_sin;
                        */

                ?>
                        <input type='text' name="<?php echo $txt_sin; ?>">
                        <br>
            <?php
                    }
                }
            } ?>
            <input type="submit" value="Siguiente">
            </form>
        <?php
    } else {
        //nombrar el numero de preguntas de cada una, para poder hacer el bucle
        $num_preg = $_SESSION["preg"];
        echo "Encuesta creada con éxito, puede verla en el apartado de Encuestas en el menú principal";
        for ($i = 0; $i < $num_preg; $i++) {
            $preg = $_POST["preg" . $i];
            //Solo llegan cuando no hay espacios de por medio, podemos porbar a crear una variable con el contenido de la pregunta sin espacios
            $preg_t = str_replace(' ', '', trim($preg));
            $cant = $_POST["cant" . $i];
            //añadir un IF para las que no tengan opciones (texto)

            if ($cant != 0) {
                //echo $preg_t . "<br>";
                for ($j = 0; $j < $cant; $j++) {
                    $txt = $_POST[$preg_t . $j];
                    //echo $txt;
                    $query = mysqli_query($bd, "SELECT * FROM preguntas WHERE ID_encuesta = $id_enc AND texto = '$preg'");
                    foreach ($query as $data) {
                        $id = $data["ID_pregunta"];
                        $tipo = $data["tipo"];
                    }
                    /*
                    echo "<br>";
                    echo $id;
                    echo "<br>";
                    echo $tipo;
                    echo "<br>";
                    */
                    if ($tipo == 'rad') {
                        $tabla = 'op_radio';
                    } elseif ($tipo == 'che') {
                        $tabla = 'op_check';
                    } elseif ($tipo == 'sel') {
                        $tabla = 'op_select';
                    } else {
                        break;
                    }
                    //echo $tabla;
                    //echo "<br>";
                    $query2 = "INSERT INTO $tabla VALUES (DEFAULT, $id, '$txt')";
                    //echo $query2;

                    mysqli_query($bd, $query2);
                }
            } else {
                echo "No has introducido ningún valor";
            }
            //echo $preg . "<br>";
        }
        ?>
            <form action="Pagina_principal.php" method="POST">
                <input type="submit" value="Volver a la página principal.">
            </form>
    <?php
    }
}
