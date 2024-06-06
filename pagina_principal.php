<html lang="es">

<head>

    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">

    <link rel="stylesheet" href="CSS\estilos.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
include 'encabezado.php';
?>

<body class="fondo">

    <?php
    session_start();
    $bd=mysqli_connect("localhost", "root","password", "varlud");
    //borrado de encuestas sin preguntas
    $sel = mysqli_query($bd, "SELECT * FROM encuestas");
    foreach ($sel as $data) {
        $id_borr = $data["ID_encuesta"];
        $sel2 = mysqli_query($bd, "SELECT * FROM preguntas WHERE ID_encuesta=$id_borr");
        if (mysqli_num_rows($sel2) < 1) {
            $sel_borr = "DELETE FROM encuestas WHERE ID_encuesta = $id_borr";
            mysqli_query($bd, $sel_borr);
        } else {
        }
    }
    $query1 = mysqli_query($bd, "SELECT ID_encuesta FROM encuestas ORDER BY ID_encuesta DESC LIMIT 3;");
    $i = 0;
    $arr = [];
    //Creamos un array, donde almacenaremos los 3 id_encuesta de las últimas 3 encuestas registradas en nuestra web
    foreach ($query1 as $data) {
        $id = $data["ID_encuesta"];
        $arr[] = $id;
    }
    $query2 = mysqli_query($bd, "SELECT * FROM encuestas WHERE ID_encuesta = $arr[0]");
    foreach ($query2 as $data2) {
        $nom1 = $data2["nombre"];
        $cif1 = $data2["CIF"];
    }
    $query3 = mysqli_query($bd, "SELECT * FROM encuestas WHERE ID_encuesta = $arr[1]");
    foreach ($query3 as $data3) {
        $nom2 = $data3["nombre"];
        $cif2 = $data3["CIF"];
    }
    $query4 = mysqli_query($bd, "SELECT * FROM encuestas WHERE ID_encuesta = $arr[2]");
    foreach ($query4 as $data4) {
        $nom3 = $data4["nombre"];
        $cif3 = $data4["CIF"];
    }


    //Sacamos con el CIF los nombres de las empresas.
    $query5 = mysqli_query($bd, "SELECT nombre FROM empresas WHERE CIF = '$cif1'");
    $query6 = mysqli_query($bd, "SELECT nombre FROM empresas WHERE CIF = '$cif2'");
    $query7 = mysqli_query($bd, "SELECT nombre FROM empresas WHERE CIF = '$cif3'");
    foreach ($query5 as $data5) {
        $emp1 = $data5["nombre"];
    }
    foreach ($query6 as $data6) {
        $emp2 = $data6["nombre"];
    }
    foreach ($query7 as $data7) {
        $emp3 = $data7["nombre"];
    }

    //Contamos las preguntas que tiene cada encuesta
    $query8 = mysqli_query($bd, "SELECT COUNT(ID_pregunta) AS total FROM preguntas WHERE ID_encuesta = $arr[0] GROUP BY ID_encuesta");
    $query9 = mysqli_query($bd, "SELECT COUNT(ID_pregunta) AS total FROM preguntas WHERE ID_encuesta = $arr[1] GROUP BY ID_encuesta");
    $query10 = mysqli_query($bd, "SELECT COUNT(ID_pregunta) AS total FROM preguntas WHERE ID_encuesta = $arr[2] GROUP BY ID_encuesta");
    foreach ($query8 as $data8) {
        $pre1 = $data8["total"];
    }
    foreach ($query9 as $data9) {
        $pre2 = $data9["total"];
    }
    foreach ($query10 as $data10) {
        $pre3 = $data10["total"];
    }

    ?>
    <!--Aquí se ubicarán las encuestas, en este caso hemos implementado los estilos dentro de la página en vez de en el documento de estilos para
    usar todo lo aprendido en clase-->
    <article style="display: flex; flex-wrap: wrap; height: 100%; margin-top: 150px;">
        <div id="izq" style="margin-left: 10% ; margin-top : 5%; height: 45%; width : 20%; background-color: rgb(238, 235, 48); border-radius: 25px;" class="form">
            <h1><?php echo $nom1; ?></h1><br>
            <br>
            <p><?php echo "<b>Empresa:</b> ". $emp1; ?></p><br>
            <br>
            <p><?php echo "<b>Preguntas:</b> " . $pre1; ?></p>
            <form action="responder.php">
                <input type="hidden" value="<?php echo $arr[0] ?>" name="id_enc">
                <input type="submit" value="Responder">
            </form>
        </div>
        <div id="cen" style="margin-left: 10% ; margin-top : 15%; height: 45%; width : 20%; background-color: lightgreen;border-radius: 25px;" class="form">
            <h1><?php echo $nom2; ?></h1><br>
            <br>
            <p><?php echo "<b>Empresa:</b> ". $emp2; ?></p><br>
            <br>
            <p><?php echo "<b>Preguntas:</b> " . $pre2; ?></p>
            <form action="responder.php">
                <input type="hidden" value="<?php echo $arr[1] ?>" name="id_enc">
                <input type="submit" value="Responder">
            </form>
        </div>
        <div id="der" style="margin-left: 10% ; margin-top : 5%; height: 45%; width : 20%; background-color: #e96a6a;border-radius: 25px;" class="form">
            <h1><?php echo $nom3; ?></h1><br>
            <br>
            <p><?php echo "<b>Empresa:</b> ". $emp3; ?></p><br>
            <br>
            <p><?php echo "<b>Preguntas:</b> " . $pre3; ?></p>
            <form action="responder.php">
                <input type="hidden" value="<?php echo $arr[2] ?>" name="id_enc">
                <input type="submit" value="Responder">
            </form>
        </div>
    </article>


</body>

</html>
