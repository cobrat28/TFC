<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>VarLud Analytics</title>
    <link rel="icon" type="image/jpg" href="Imagenes/Logo_solo.png">
    <link rel="stylesheet" href="CSS/estilos.css">
    <script>
        function toggleCantidadOpciones(selectElement, index) {
            const cantidadOpcionesInput = document.getElementById('cant_op_' + index);
            if (selectElement.value === "texto") {
                cantidadOpcionesInput.disabled = true;
                cantidadOpcionesInput.value = "";
            } else {
                cantidadOpcionesInput.disabled = false;
            }
        }

        // Función para deshabilitar inicialmente si es necesario
        function initializeCantidadOpciones() {
            const selects = document.querySelectorAll('select[name^="op"]');
            selects.forEach((select, index) => {
                toggleCantidadOpciones(select, index);
            });
        }

        // Ejecutar al cargar la página
        window.onload = initializeCantidadOpciones;
    </script>
</head>
<body class="body_ses">
<?php
session_start();
if(isset($_SESSION["admin"])){
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $preg = $_SESSION["preg"];
        $bd = mysqli_connect("localhost", "root", "", "varlud");
        $id = $_SESSION["ID_encuesta"];
        for($i=0; $i < $preg; $i++){
            ?>
            <form action="procesa_crear_dos.php" method="GET" class="form4">
                Pregunta: <input type="text" name="<?php echo 'txt' . $i; ?>"><br>
                Tipo de opciones:
                <select name="<?php echo 'op' . $i; ?>" onchange="toggleCantidadOpciones(this, <?php echo $i; ?>)">
                    <option value="texto">Caja de texto</option>
                    <option value="radio">Botones radio</option>
                    <option value="check">Botones check</option>
                    <option value="select">Desplegable</option>
                </select><br>
                Cantidad de opciones (si procede): <input type="number" id="cant_op_<?php echo $i; ?>" name="<?php echo 'cant_op' . $i; ?>"><br><br>
            <?php
        }
        ?>
        
        <input type="submit" value="Siguiente">
    </form>
    <?php
    }

}else{
    header("Location: perfil.php");
}
?>
</body>
</html>
