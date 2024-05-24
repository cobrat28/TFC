<?php
session_start();
if (isset($_SESSION["DNI"])) {
    $dni = $_SESSION["DNI"];
    $bd = mysqli_connect("localhost", "root", "", "varlud");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo "<form action='' method='POST'>";
        $id_enc = $_GET["id_enc"];
        $query = mysqli_query($bd, "SELECT * FROM preguntas WHERE ID_encuesta = $id_enc");
        //este foreach es el principal, en el que vamos a sacar los id de preguntas, si es necesario se hará count para las correspondientes, si salen más o menos preguntas de la que son.
        foreach ($query as $preg) {
            $id_preg = $preg["ID_pregunta"];
            $query2 = mysqli_query($bd, "SELECT COUNT(ID_pregunta) as 'cantidad' FROM preguntas WHERE ID_encuesta = $id_enc GROUP BY ID_encuesta");
            foreach ($query2 as $data) {
                $cant = $data["cantidad"];
            }
            for ($i = 0; $i < $cant; $i++) {
                $query3 = mysqli_query($bd, "SELECT * FROM preguntas WHERE ID_pregunta = '$id_preg'");
                $res = 'res' . $i;
                foreach ($query3 as $dato) {
                    $tipo = $dato["tipo"];
                    $texto = $dato["texto"];
                }
                echo "<h2> Pregunta: " . $texto . "</h2><br>";
                if ($tipo == "rad") {
                    echo "";
                    $query4 = mysqli_query($bd, "SELECT * FROM op_radio WHERE ID_pregunta = '$id_preg'");
                    foreach ($query4 as $data4) {
                        $opcion = $data4["valor"];
                        echo "<label><input type='radio' name=' . $res . ' value='" . $opcion . "' required>" . $opcion . "<label>";
                    }
                    echo "";
                } elseif ($tipo == "che") {
                    echo "";
                    $query4 = mysqli_query($bd, "SELECT * FROM op_check WHERE ID_pregunta = '$id_preg'");
                    foreach ($query4 as $data4) {
                        $opcion = $data4["valor"];
                        echo "<label><input type='checkbox' name=' . $res . ' value='" . $opcion . "' required>" . $opcion . "<label>";
                    }
                    echo "";
                } elseif ($tipo == "sel") {
                    echo "";
                    echo "<select name=' . $res . ' required>";
                    $query4 = mysqli_query($bd, "SELECT * FROM op_select WHERE ID_pregunta = '$id_preg'");
                    foreach ($query4 as $data4) {
                        $opcion = $data4["valor"];
                        echo "<option value=" . $opcion . ">" . $opcion . "</option>";
                    }
                    echo "</select>";
                    echo "";
                } else {
                    echo "";
                    echo "<input type='text' name='" . $res ."' required>";
                    echo "";
                }
            }
        }
        echo "";
        echo "<input type='submit' value='Enviar respuestas.'>";
        echo "</form>";
    } else {
        //POST
    }
} else {
    //No hay usuario registrado
    header("Location: login.html");
}
