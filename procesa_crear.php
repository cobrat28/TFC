<?php
session_start();
if(isset($_SESSION["admin"])){
    $preg = $_SESSION["preg"];
    $id = $_SESSION["ID_encuesta"];
    ?>
    <form action="" method = "POST">
    <?php
    for(i=1; i<=$preg; i++){
        ?>
        Pregunta: <input type="text" name="<?php echo $txt'"$i"';?>"><br>
        Tipo de opciones:
        <select id="<?php echo $i;?>" name="<?php echo $op'"$i"';?>" onchange="opcionesOnChange()">
            <option value="texto">Caja de texto</option>
            <option value="radio">Botones radio</option>
            <option value="check">Botones check</option>
            <option value="select">Desplegable</option>
        </select><br>
        
        <script>
            let cant = document.GetElementById("<?php echo $i;?>");
            function opcionesOnChange() {
                var opcionSeleccionada = select.value;
    var contenedor = document.getElementById('contenedor');

    // Limpiar el contenedor antes de añadir nuevas cajas de texto
    contenedor.innerHTML = '';

    // Añadir cajas de texto según la opción seleccionada
    if (opcionSeleccionada === 'opcion1') {
        agregarCajasTexto(contenedor, 2); // Ejemplo: 2 cajas de texto para opción 1
    } else if (opcionSeleccionada === 'opcion2') {
        agregarCajasTexto(contenedor, 3); // Ejemplo: 3 cajas de texto para opción 2
    } else if (opcionSeleccionada === 'opcion3') {
        agregarCajasTexto(contenedor, 1); // Ejemplo: 1 caja de texto para opción 3
    }
}

function agregarCajasTexto(contenedor, cantidad) {
    for (var i = 0; i < cantidad; i++) {
        // Crear un nuevo elemento de entrada de texto (input)
        var input = document.createElement('input');
        input.type = 'text'; // Tipo de input es texto

        // Añadir la nueva caja de texto al contenedor
        contenedor.appendChild(input);
    }
}

        </script>
    <?php
    }else{
        ?>
        </form>
        <?php
    }
}else{
    header("Location: perfil.php");
}