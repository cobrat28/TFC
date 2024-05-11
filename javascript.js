function generar_opcion(value, id, i) {
    console.log(value + ":" + id + ":" + i);
    const idHtml = "html" + i;

    if (document.getElementById(idHtml) != null) {
        document.getElementById(idHtml).remove();
    }

    let html = "<div id= "+ idHtml +" >";
    switch (value) {
        case 'texto':
            html += "<p>Hola mundo texto</p>";
            break;

        case 'radio':
            html += "<p>Hola mundo radio</p>";
            html += "<input type=text id=valor >";
            sql = "INSERT INTO op_radio VALUES ";
            html += "<button onclick=subir(valor.value, " + id + ")>Subir</button>";
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

function subir(value, id){
    sql += "(DEFAULT, '" + id +"', '" + value + "')";
    console.log("SQL: " + sql);
    bd = "mysqli_connect('localhost', 'root', '', 'varlud');"
    query = "mysqli_query(" + bd + ", " + sql + ");";
    document.getElementById(insert).insertAdjacentHTML("afterend", query);
   
}