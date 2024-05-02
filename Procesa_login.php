<?php
    
if(isset($_POST["email"]) && isset($_POST["passwd"])) {
    $bd = mysqli_connect("localhost", "root", "", "varlud");
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];
    $query = mysqli_query($bd, "SELECT * FROM login WHERE correo='$email'");

    if(mysqli_num_rows($query) > 0) {
        session_start();
        foreach ($query as $dato) {
            $hashed = $dato["contraseña"];
        }
        $iscorrect=password_verify($passwd, $hashed);
        if ($iscorrect) {
           foreach ($query as $dato) {
                $_SESSION["correo"] = $dato["correo"];
            }
            $query2 = mysqli_query($bd, "SELECT * FROM usuarios WHERE correo='{$_SESSION['correo']}'");

            foreach ($query2 as $dato2) {
                $_SESSION["DNI"] = $dato2["DNI"];
                $_SESSION["CIF"] = $dato2["CIF"];
            }
            header("Location: pagina_principal.php");
        }else {
            header("Location: Login.php");
        }
        }
   else {
    header("Location: Login.php");
}     
} else {
    header("Location: Login.php");
}
?>
