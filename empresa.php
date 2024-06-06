<!DOCTYPE html>
<!--Esta página muestra las encuestas que tiene cada empresa, están separadas por nombre de empresa y CIF como titulo resaltado.
Tienen un botón de redirección a responder para que el usuario pueda ubicar a que empresa pertenece cada encuesta y la pueda responder facilmente-->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <link rel="stylesheet" href="CSS\estilos.css">
</head>

<body class="body_ses">
<?php
include 'encabezado.php';
?>

<?php

$bd = mysqli_connect("localhost", "usu_varlud", "P@ssw0rd", "varlud");
$query = mysqli_query($bd, "SELECT * FROM empresas");
foreach($query as $data){
    $emp = $data["nombre"];
    $cif = $data["CIF"];
    echo "<h1 class='form5'>Empresa: " . $emp . "<br> <br> CIF: " . $cif . "</h1>";
    $query2 = mysqli_query($bd, "SELECT COUNT(ID_encuesta) as 'encuestas' FROM encuestas WHERE CIF ='$cif' GROUP BY '$cif'");
    foreach($query2 as $data2){
        $cant = $data2["encuestas"];
    }
    $query3 = mysqli_query($bd, "SELECT nombre, ID_encuesta FROM encuestas WHERE CIF ='$cif'");
    foreach($query3 as $data3){
        $id_enc = $data3["ID_encuesta"];
        $nom = $data3["nombre"];
        echo "<form action='responder.php' method='GET' class='form10'>";
        echo "<h2>" . $nom ."</h2>";
        echo "<p>" . $cant ." Preguntas</p>";
        echo "<input type='hidden' name='id_enc' value=" . $id_enc .">";
        echo "<input type='submit' value='Responder'>";
        echo "</form>";
    }
}
?>
</body>
</html>
