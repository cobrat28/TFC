<html lang="es">

    <head>

    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.jpg">

        <link rel="stylesheet" href="CSS\estilos.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body class="fondo" >
        <?php 
            $bd=mysqli_connect("localhost", "root", "", "varlud");
            $query1=mysqli_query($bd, "SELECT ID_encuesta FROM encuestas ORDER BY desc LIMIT 3;");
            foreach($query1 as $data){
                $cod"$i" = $data["ID_encuesta"];
            }
            $query2=mysqli_query($bd, "SELECT * FROM encuestas WHERE ID_encuesta = $cod0");
            $query3=mysqli_query($bd, "SELECT * FROM encuestas WHERE ID_encuesta = $cod1");
            $query4=mysqli_query($bd, "SELECT * FROM encuestas WHERE ID_encuesta = $cod2");
            foreach($query2 as $data2){
                $nom1 = $data2["nombre"];
                $cif1 = $data2["CIF"];
            }
            foreach($query3 as $data3){
                $nom2 = $data3["nombre"];
                $cif2 = $data3["CIF"];
            }
            foreach($query4 as $data4){
                $nom3 = $data4["nombre"];
                $cif3 = $data4["CIF"];
            }
            $query5=mysqli_query($bd, "SELECT * FROM empresas WHERE CIF = $cif1");
            $query6=mysqli_query($bd, "SELECT * FROM empresas WHERE CIF = $cif2");
            $query7=mysqli_query($bd, "SELECT * FROM empresas WHERE CIF = $cif3");
            foreach($query5 as $data5){
                $emp1 = $data2["nombre"];
            }
            foreach($query6 as $data6){
                $emp2 = $data6["nombre"];
            }
            foreach($query7 as $data7){
                $emp3 = $data7["nombre"];
            }
            $query8=mysqli_query($bd, "SELECT COUNT(ID_pregunta) AS total FROM preguntas WHERE ID_encuesta = $cod0 GROUP BY ID_encuesta");
            $query9=mysqli_query($bd, "SELECT COUNT(ID_pregunta) AS total FROM preguntas WHERE ID_encuesta = $cod1 GROUP BY ID_encuesta");
            $query10=mysqli_query($bd, "SELECT COUNT(ID_pregunta) AS total FROM preguntas WHERE ID_encuesta = $cod2 GROUP BY ID_encuesta");
            foreach($query2 as $data2){
                $pre1 = $data8["total"];
            }
            foreach($query3 as $data3){
                $pre2 = $data0["total"];
            }
            foreach($query4 as $data4){
                $pre3 = $data10["total"];
            }
        ?>
        <nav class="top">
            <div class="uno"><a href=Pagina_principal.php><img class="uno_img" src="Imagenes\Logo_solo.jpg" height="50%"></a></div>
            <div class="dos"><p><a href="https://google.com">Encuestas</a></p></div>
            <div class="tres"><p><a href="https://google.com">Empresas</a></p></div>
            <div class="cuatro"><p><a href="perfil.php">Mi Perfil</a></p></div>
        </nav>

        <article style="display: flex; flex-wrap: wrap; height: 100%; margin-top: 0%;">
            <div id="izq" style="margin-left: 10% ; margin-top : 5%; height: 45%; width : 20%; background-color: yellow; border-radius: 25px;"><p><?php echo $nom1; ?></p><br>
            <br><p><?php echo $emp1; ?></p><br>
            <br><p><?php echo $pre1; ?></p>
            </div>
            <div id="cen" style="margin-left: 10% ; margin-top : 15%; height: 45%; width : 20%; background-color: lightgreen;border-radius: 25px;"><p><?php echo $nom2; ?></p><br>
            <br><p><?php echo $emp2; ?></p><br>
            <br><p><?php echo $pre2; ?></p></div>
            <div id="der" style="margin-left: 10% ; margin-top : 5%; height: 45%; width : 20%; background-color: #e96a6a;border-radius: 25px;"><p><?php echo $nom3; ?></p><br>
            <br><p><?php echo $emp3; ?></p><br>
            <br><p><?php echo $pre3; ?></p></div>
        </article>

    </body>

</html>