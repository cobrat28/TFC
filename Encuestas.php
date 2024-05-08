<!DOCTYPE html>
<html>
<head>
<title>VarLud Analytics</title>
<link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.jpg">
</head>
<body>

<?php
    
    $bd=mysqli_connect("localhost", "root", "", "varlud");


    $query=mysqli_query($bd,"SELECT CIF, nombre FROM encuestas");
    foreach ($query as $dato){
        $nombre=$dato["nombre"];
        $CIF=$dato["CIF"];
    }

?>

</body>
</html>
