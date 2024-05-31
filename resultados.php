<!DOCTYPE html>
<html>

<head>
    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <link rel="stylesheet" href="CSS\estilos.css">
</head>
<body class="body_print">
<?php
session_start();
if (isset($_SESSION["admin"])) {
    $cif = $_SESSION["CIF"];
    $bd=mysqli_connect("localhost", "root","", "varlud");
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        echo "<form action=perfil.php>";
        echo "<input type='submit' value='Volver'>";
        echo "</form>";
        echo "";
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
            echo "<input type='hidden' name='nom' value='" . $nom . "'>";
            echo "<input type='submit' value='Revisar'>";
            echo "</form>";
            echo "</div>";
        }
        echo "";
        echo "<form action=perfil.php>";
        echo "<input type='submit' value='Volver'>";
        echo "</form>";
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
        echo "";
        echo "<form action='' method='GET'>";
        echo "<input type='submit' value='Volver'>";
        echo "</form>";
    }
} else {
    //header("Location: pagina_principal.php");
}
?>
</body>
</html>
