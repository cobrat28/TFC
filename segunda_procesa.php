<?php
session_start();
if (isset($_SESSION["admin"])) {
    $bd = mysqli_connect("localhost", "root", "", "varlud");
    //where max(ID_pregunta)
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $preg = $_SESSION["preg"];
        $id = $_SESSION["ID_encuesta"];
        for ($i = 0; $i < $preg; $i++) {
            $txt = $_GET["txt" . $i];
            $op = $_GET["op" . $i];
            $cant = $_GET["cant_op" . $i];
            echo "$txt <br>";
            echo "$op <br>";
            echo "$cant <br>";
            //mysqli_query($bd, "INSERT INTO preguntas VALUES (DEFAULT, $id, $op, $txt)");
            ?>
            <form action="" method="POST">
                <p><?php echo $txt ?></p>
                <?php 
                for ($j = 0; $j < $cant; $j++) {
                    ?>
                    <?php echo "$txt . $j"; ?>
                    <input type='text'name= "<?php echo $txt . $j; ?>">
                    <?php
                    }

        } ?>
                <input type="submit" value="Siguiente">
                </form>
        <?php
    } else {
        $query = mysqli_query($bd, "SELECT MAX(ID_pregunta) FROM preguntas");
        foreach ($query as $data) {
            $id_preg = $data["MAX(ID_pregunta)"];
            echo "$id_preg <br>";
            for($i=0;$i<0;$i++){
                $txt = "txt" . $i;
                for(){

                }
            }
        }
    }
}
