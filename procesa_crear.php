<?php
session_start();
if(isset($_SESSION["admin"])){
    $preg = $_SESSION["preg"];
    ?>
    <form action="" method = "POST">
    <?php
    for($i=1; $i<=$preg; $i++){
        ?>
        Pregunta: <input type="text" name="<?php echo 'txt' . $i;?>"><br>
        Tipo de opciones:
        <select id="<?php echo $i;?>" name="<?php echo 'op' . $i;?>" onchange="opcionesOnChange()">
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
                if (opcionSeleccionada === 'radio') {
                    agregarCajasTexto(contenedor, 2); 
                    <button onclick="caja">Añadir</button>
                } else if (opcionSeleccionada === 'check') {
                    agregarCajasTexto(contenedor, 2); 
                    <button onclick="caja">Añadir</button>
                } else if (opcionSeleccionada === 'select') {
                    agregarCajasTexto(contenedor, 2); 
                    <button onclick="caja">Añadir</button>
                }
            }
            function agregarCajasTexto(contenedor, cantidad) {
                for (var i = 0; i < cantidad; i++) {
                    var input = document.createElement('input');
                    input.type = 'text';
                   // Añadir la nueva caja de texto al contenedor
                    contenedor.appendChild(input);
                }
            }
            function caja() {
                var input = document.createElement('input');
                input.type = 'text';
                // Añadir la nueva caja de texto al contenedor
                contenedor.appendChild(input);
                }
        </script>
    <?php
    }
        ?>
        </form>
        <?php
    }
else{
    header("Location: perfil.php");
}