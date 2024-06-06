<?php
//En esta página es donde se comprueba que los datos introducidos concuerden en nuestra base de datos, en ese caso, el usuario
//pasa a la página principal y se le crea una sesión, en caso contrario se le devuelve a la página de login   
if (isset($_POST["email"]) && isset($_POST["passwd"])) {
    $bd = mysqli_connect("localhost", "root", "password", "varlud");
    $email = $_POST["email"];
    $passwd = $_POST["passwd"];
    $query = mysqli_query($bd, "SELECT * FROM login WHERE correo='$email'");

    session_start();
    if (mysqli_num_rows($query) > 0) {
        foreach ($query as $dato) {
            $hashed = $dato["contraseña"];
        }
        $iscorrect = password_verify($passwd, $hashed);
        if ($iscorrect) {
            unset($_SESSION["error"]);
            foreach ($query as $dato) {
                $_SESSION["correo"] = $dato["correo"];
            }
            $query2 = mysqli_query($bd, "SELECT * FROM usuarios WHERE correo='{$_SESSION['correo']}'");

            foreach ($query2 as $dato2) {
                $_SESSION["DNI"] = $dato2["DNI"];
                $dni = $dato2["DNI"];
                $_SESSION["CIF"] = $dato2["CIF"];
            }
            $query3 = mysqli_query($bd, "SELECT * FROM usuarios WHERE DNI='$dni'");
            foreach ($query3 as $data) {
                $admin = $data["admin"];
            }
            if ($admin == 1) {
                $_SESSION["admin"] = 1;
            }

            header("Location: pagina_principal.php");
        } else {
            $_SESSION["error"] = 1;
            header("Location: index.php");
            exit();
        }
    } else {
        $_SESSION["error"] = 1;
        header("Location: index.php");
        exit();
    }
} else {
    header("Location: index.php");
}
