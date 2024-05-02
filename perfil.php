<?php
 session_start();
 if(isset $_SESSION["DNI"]){
    $bd=mysqli_connect("localhost", "root", "", "varlud");
    $dni=$_SESSION["DNI"];
    $query1=mysqli_query($bd,"SELECT * FROM usuarios WHERE DNI='$dni'");
    foreach ()
 } else{
    header("Locarion: Login.php");
 }