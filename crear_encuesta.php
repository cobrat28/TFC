<?php
session_start();
if(isset($_SESSION["admin"])){
    $preg =$_POST["preg"];
    $cif = $_SESSION["CIF"];
    $nom = $_POST["nombre"];
    $_SESSION["preg"] = $_POST["preg"];
    $bd = mysqli_connect("localhost", "root", "", "varlud");
    mysqli_query($bd, "INSERT INTO encuestas VALUES (DEFAULT, '$cif', '$nom')");
    $query = mysqli_query($bd, "SELECT * FROM encuestas WHERE nombre = '$nom'");
        foreach ( $query as $data){
            $_SESSION["ID_encuesta"] = $data["ID_encuesta"];
        }
    
}else{
    header("Location: perfil.php");
}