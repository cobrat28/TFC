<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php

        session_start();

        $bd = mysqli_connect("localhost","root","","varlud");

    ?>

    <div class="bodyer">
        <div>

            <?php

                if (isset($_SESSION["email"]) ) {

                    if(isset($_SESSION["email"])){
                        $tabla_usuarios = mysqli_query($bd, "SELECT * FROM usuarios WHERE correo LIKE '" . $_SESSION["email"] . "'");
                        $nm_us=mysqli_fetch_array($tabla_usuarios)['nombre'];

                        echo"<h1>Bienvenid@ " .  $nm_us . "</h1><br>";
                    } 

                } else {
                    
                    if(isset($_POST["email"]) && isset($_POST["contr"])){

                        $tabla_usuarios = mysqli_query($bd, "SELECT * FROM usuarios WHERE correo LIKE '" . $_POST["email"] . "'");

                        if(mysqli_num_rows($tabla_usuarios)!= 0){

                            $pass_hash = mysqli_fetch_array($tabla_usuarios)['password'];
                            
                            if (password_verify($_POST["contr"], $pass_hash)){

                                $tabla_usuarios = mysqli_query($bd, "SELECT * FROM usuarios WHERE correo LIKE '" . $_POST["email"] . "'");
                                $nm_us=mysqli_fetch_array($tabla_usuarios)['nombre'];
                                echo"<h1>Bienvenid@ " .  $nm_us . "</h1><br>";

                                $_SESSION["email"] = $_POST["email"];

                            }else{
                                
                                header('Location: login.php?error=1');
                            }

                        }else{

                            header('Location: login.php?error=1');

                        }

                    } else {

                        header('Location: login.php?error=1');

                    }

                }

                echo '<h2><a href="encuesta.php"> Encuesta 1</a></h2>';
            ?>
        </div>
    </div>
</body>
</html>