function generar_opcion(value, id, i) {
    console.log("linea2");
    console.log(value + ":" + id + ":" + i);
    const idHtml = "html" + i;

    if (document.getElementById(idHtml) != null) {
        document.getElementById(idHtml).remove();
    }

    let html = "<div id= " + idHtml + " >";
    console.log("saramambiche");

    switch (value) {
        case 'texto':
            html += "<p>Hola mundo texto</p>";
            break;

        case 'radio':
            html += "<p>Hola mundo radio</p>";
            html += "<input type=text id=opcion >";
            op = "op_radio";
            html += "<input type=\"button\" onclick=\"subir(" + op + ")\" value=\"Subir\">";
            break;

        case 'check':
            html += "<p>Hola mundo check</p>";
            break;

        case 'select':
            html += "<p>Hola mundo select</p>";
            break;
    }
    html += "</div>"
    document.getElementById(id).insertAdjacentHTML("afterend", html);
}

function subir(op) {
    console.log("entrará a subir");
    let input = document.getElementById("opcion");
    let valor = input.opcion.trim();
    if (valor.length === 0) {
        alert("No se ha proporcionado ningún valor");
    } else {
        //nextval aquí
        bd = "mysqli_connect('localhost', 'root', '', 'varlud');";
        sql= "'INSERT INTO ";
        sql =+ op;
        sql =+ "VALUES "
        prequery = "mysqli_query(" + bd + ", 'SELECT MAX(ID_pregunta) FROM preguntas');" ;
        prequery++;
        sql += "(" + prequery +", " + id + ", " + valor + "')";
        console.log("SQL: " + sql);
        query = "mysqli_query(" + bd + ", " + sql + ");";
        //document.getElementById(insert).insertAdjacentHTML("afterend", query);
    }
    console.log("final ");
}