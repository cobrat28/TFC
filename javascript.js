function generar_opcion(value, iden, i) {
    console.log("linea2");
    console.log(value + ":" + iden + ":" + i);
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
            console.log(op);
            console.log(iden);
            html += "<input type=\"button\" onclick=\"subir(op, "+ iden +")\" value=\"Subir\">";
            break;

        case 'check':
            html += "<p>Hola mundo check</p>";
            break;

        case 'select':
            html += "<p>Hola mundo select</p>";
            break;
    }
    html += "</div>"
    document.getElementById(i).insertAdjacentHTML("afterend", html);
}

function subir(op, ida) {
    console.log("entrará a subir");
    let input = document.getElementById("opcion").value;
    console.log(op);
    console.log(ida);
    if (input.length === 0) {
        alert("No se ha proporcionado ningún valor");
    } else {
        //document.getElementById(insert).insertAdjacentHTML("");
        bd = "mysqli_connect('localhost', 'root', '', 'varlud');";
        sql = "'INSERT INTO " + op + " VALUES ";
        console.log("SQL3: " + sql);
        prequery = "mysqli_query(" + bd + ", 'SELECT MAX(ID_pregunta) FROM preguntas');";
        prequery++;
        sql += "(DEFAULT,"+ ida +", '" + input +"')'";
        console.log("SQL5: " + sql);
        query = "<?php mysqli_query(" + bd + ", " + sql + "); ?>";
        console.log(query);
        document.getElementById('insert').insertAdjacentHTML("afterend", query);
    }
    console.log("final ");
}