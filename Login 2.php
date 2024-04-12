<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

    <?php
        session_start();

        if (isset($_SESSION['email'])) {
            session_destroy();
            header('Location: login.php');
        }
        require('encabezado.php');
    ?>

    <div class="bodyer">   
        <form action="principal.php" method="post">
            <label for='email'>Email: </label>
            <input name="email" type="email"><br /><br />
            <label for='contr'>Contraseña: </label>
            <input name="contr" type="password"><br /><br />
            <input type="submit" value="Acceder"><br />
            
            <?php
                if (isset($_GET['error'])){
                    echo "<br /><label>El usuario o la contraseña son incorrectos.</label>";

                }
            ?>
        </form>
    </div>
    
    <a href="registro.php"> Regístrate aquí </a>

</body>
</html>