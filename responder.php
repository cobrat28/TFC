<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <link rel="stylesheet" href="CSS\estilos.css">
</head>
<body class="body_print">
<?php
session_start();
if (isset($_SESSION["DNI"])) {
    $dni = $_SESSION["DNI"];
    $bd = mysqli_connect("localhost", "root", "", "varlud");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo "<form action='' method='POST' class='form11'>";
        $id_enc = $_GET["id_enc"];
        $query = mysqli_query($bd, "SELECT * FROM preguntas WHERE ID_encuesta = $id_enc");
        //este foreach es el principal, en el que vamos a sacar los id de preguntas, si es necesario se hará count para las correspondientes, si salen más o menos preguntas de la que son.
        $i = 0;
        foreach ($query as $preg) {
            $id_preg = $preg["ID_pregunta"];
            $query2 = mysqli_query($bd, "SELECT COUNT(ID_pregunta) as 'cantidad' FROM preguntas WHERE ID_encuesta = $id_enc GROUP BY ID_encuesta");
            foreach ($query2 as $data) {
                $cant = $data["cantidad"];
            }
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
                    echo "<label><input type='radio' name='" . $res . "' value='" . $opcion . "' required>" . $opcion . "<label><br>";
                }
                echo "";
            } elseif ($tipo == "che") {
                echo "";
                $query4 = mysqli_query($bd, "SELECT * FROM op_check WHERE ID_pregunta = '$id_preg'");
                foreach ($query4 as $data4) {
                    $opcion = $data4["valor"];
                    //Necesitamos marcar que las preguntas de tipo check se amnden como array, de ahí la estructura de name ='{$res}[]'
                    echo "<label><input type='checkbox' name='{$res}[]' value='" . $opcion . "'>" . $opcion . "<label><br>";
                }
                echo "";
            } elseif ($tipo == "sel") {
                echo "";
                echo "<select name='" . $res . "' required>";
                $query4 = mysqli_query($bd, "SELECT * FROM op_select WHERE ID_pregunta = '$id_preg'");
                foreach ($query4 as $data4) {
                    $opcion = $data4["valor"];
                    echo "<option value='" . $opcion . "'>" . $opcion . "</option>";
                }
                echo "</select>";
                echo "";
            } else {
                echo "";
                echo "<input type='text' name='" . $res . "' required>";
                echo "";
            }
            $i++;
        }
        echo "<br>";
        echo "<br>";
        echo "<input type='hidden' name='id_enc' value='" . $id_enc . "'>";
        echo "<input type='hidden' name='cant' value='" . $i . "'>";
        echo "<input type='submit' value='Enviar respuestas.'>";
        echo "</form>";
    } else {
        //POST
        $cant = $_POST["cant"];
        $id_enc = $_POST["id_enc"];
        $query = mysqli_query($bd, "SELECT * FROM preguntas WHERE ID_encuesta = $id_enc");
        $i = 0;
        //echo $cant;
        echo "<h1 class= 'form5'>Resumen de la encuesta:</h1><br>";
        echo "<br>";
        foreach ($query as $preg) {
            $id_preg = $preg["ID_pregunta"];
            $txt = $preg["texto"];
            $res = 'res' . $i;
            $ans = $_POST["$res"];
            //hacemos eset if porque las opciones de tipo check se almacenan en un array, entonces las tenemos que descommponer.
            $chk = mysqli_query($bd, "SELECT tipo FROM preguntas WHERE ID_pregunta = $id_preg;");
            $type = mysqli_fetch_assoc($chk)["tipo"];
            if ($type == 'che') {
                $ans_imp = implode(", ", $ans);
                //var_dump($ans);
                echo "<div class='form12'><h2>" . $txt . "</h2>";
                echo "<h3>" . $ans_imp  . "</h3></div><br>";
                //$query2 = "INSERT INTO respuestas VALUES (DEFAULT, $id_preg, $id_enc, '$dni', '$ans_imp')";
            } else {
                echo "<div class='form12'><h2>" . $txt . "</h2>";
                echo "<h3>" . $ans  . "</h3></div><br>";
                //$query2 = "INSERT INTO respuestas VALUES (DEFAULT, $id_preg, $id_enc, '$dni', '$ans')";
            }
            //mysqli_query($bd, $query2);
            $i++;
        }
        echo "<form action = 'Pagina_principal.php'><input type = 'submit' value='Volver a la página principal.'></form>";
    }
} else {
    //No hay usuario registrado
    header("Location: login.html");
}
?>
</body>
</html>
