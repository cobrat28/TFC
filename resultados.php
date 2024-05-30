<?php
session_start();
if (isset($_SESSION["admin"])) {
    $cif = $_SESSION["CIF"];
    $bd = mysqli_connect("localhost", "root", "", "varlud");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo "<h1 class=''> Aquí tienes tus encuestas, revisa los resultados </h1>";
        $query = mysqli_query($bd, "SELECT * FROM encuestas WHERE CIF='$cif'");
        foreach ($query as $data) {
            $id = $data["ID_encuesta"];
            $nom = $data["nombre"];
            echo "<div class=''>";
            echo "<form action='' method='POST'>";
            echo "<h1>" . $nom . "</h1>";
            echo "<h2>" . $id . "</h2>";
            echo "<input type='hidden' name='id' value=" . $id . ">";
            echo "<input type='hidden' name='nom' value=" . $nom . ">";
            echo "<input type='submit' value='Revisar'>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        $id_enc = $_POST["id"];
        $nom = $_POST["nom"];
        echo "<h1>" . $nom . "</h1>";
        $query = mysqli_query($bd, "SELECT * FROM preguntas WHERE ID_encuesta=$id_enc");
        foreach ($query as $data) {
            $id_preg = $data["ID_pregunta"];
            $preg = $data["texto"];
            echo "<h2>" . $preg . "</h2>";
            $query2 = mysqli_query($bd, "SELECT * FROM respuestas WHERE ID_pregunta=$id_preg");
            foreach ($query2 as $data2) {
                $res = $data2["respuesta"];
                echo "$res <br>";
            }
        }
    }
} else {
    header("Location: Pagina_principal.php");
}
