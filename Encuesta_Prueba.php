<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
</head>
<body>

<h2>Encuesta</h2>
<form action="Encuesta_Prueba.php" method="post">
    <p>Pregunta 1: ¿Te gustaría recibir actualizaciones por correo electrónico?</p>
    <input type="checkbox" name="pregunta1" value="si"> Sí<br>
    <input type="checkbox" name="pregunta1" value="no"> No<br>

    <p>Pregunta 2: ¿Qué tipo de películas prefieres?</p>
    <input type="radio" name="pregunta2" value="accion"> Acción<br>
    <input type="radio" name="pregunta2" value="comedia"> Comedia<br>
    <input type="radio" name="pregunta2" value="drama"> Drama<br>

    <p>Pregunta 3: ¿Cuántas horas duermes por noche?</p>
    <input type="number" name="pregunta3" min="0" max="24"><br>

    <p>Pregunta 4: ¿Cuál es tu color favorito?</p>
    <select name="pregunta4">
        <option value="rojo">Rojo</option>
        <option value="azul">Azul</option>
        <option value="verde">Verde</option>
        <option value="amarillo">Amarillo</option>
    </select><br><br>

    <input type="submit" value="Enviar">
</form>

</body>
</html>