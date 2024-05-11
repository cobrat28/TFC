<?php
session_start();
if(isset($_SESSION["admin"])){
    $bd = mysqli_connect("localhost", "root", "", "varlud");
    $id = $_SESSION["ID_pregunta"];
    //coger la última pregunta con LIMIT 1
    if($tipo == "check"){
        $query = ($bd, "SELECT COUNT(ID_opcion) AS 'opciones' FROM op_check WHERE ID_pregunta = $id");
        foreach($query as $data){
            $op = $data["opciones"];
        }
        if($cant_op <= $op){
            //action y method por definir, aunque es probable que sea a esta misma página
            ?>
            <form action="" method="">
                Opción: <input type="text" name="op_chk">
                <input type="submit" value="Añadir">
        </form>
        <?php
        }
    }elseif($tipo = radio){

    }elseif($tipo = select){

    }else{

    }
    if($_SERVER["REQUEST_METHOD"]=="GET"){
         
        if($)