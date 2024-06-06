<!DOCTYPE html>
<!--Esta página muestra todas las encuestas disponibles con en nombre de la encuesta, el número de pregunta y la empresa propietaria, tienen un
botón de responder para rellenarlas-->
<html>

<head>
    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <link rel="stylesheet" href="CSS\estilos.css">
</head>
<?php
include 'encabezado.php';
?>

<body class="body_emp">
    <article>
        <?php
        $bd = mysqli_connect("localhost", "root", "", "varlud");
        //borrado de encuestas sin preguntas

        $sel = mysqli_query($bd, "SELECT * FROM encuestas");
        foreach ($sel as $data) {
            $id_borr = $data["ID_encuesta"];
            $sel2 = mysqli_query($bd, "SELECT * FROM preguntas WHERE ID_encuesta=$id_borr");
            if (mysqli_num_rows($sel2) < 1) {

                $sel_borr = "DELETE FROM encuestas WHERE ID_encuesta = $id_borr";
                echo $sel_borr;
                mysqli_query($bd, $sel_borr);


            } else {
            }
        }

//Aquí se hace el recuento de las preguntas, el nombre de la empresa y el nombre de la encuesta
        $query = mysqli_query($bd, "SELECT * FROM encuestas");
        foreach ($query as $dato) {
            $nom = $dato["nombre"];
            $id = $dato["ID_encuesta"];
            $cif = $dato["CIF"];
            $query2 = mysqli_query($bd, "SELECT COUNT(ID_pregunta) as 'cantidad' FROM preguntas WHERE ID_encuesta='$id' GROUP BY ID_encuesta");
            foreach ($query2 as $dato2) {
                $cant = $dato2["cantidad"];
            }
            $query3 = mysqli_query($bd, "SELECT nombre FROM empresas WHERE CIF='$cif'");
            foreach ($query3 as $dato3) {
                $emp = $dato3["nombre"];
            }
        ?>
            <div class="form7">
                <h2><?php echo $nom; ?></h2>
                <p>Preguntas: <?php echo $cant; ?></p><br>
                <p>Empresa: <?php echo $emp; ?></p><br>
                <form action="responder.php">
                    <input type="hidden" name="id_enc" value="<?php echo $id; ?>">
                    <input type="submit" value="Responder">
                </form>
            </div>
        <?php
        }
//Este enlace es una redirección para llegar a la página de creación de encuestas. Solo los administradores pueden crearlas
        echo "<div style='text-align: center; height: 100px'><mark><a href='opciones_encuestas.php'> Pulsa aquí para crear una encuesta. </a></mark></div><br>";

        ?>
    </article>
</body>

</html>
