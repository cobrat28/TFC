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
            html += "<input type=text id=opcion >";
            sql = "INSERT INTO op_radio VALUES ";
            html += "<button onclick=subir()>Subir</button>";
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

function subir(){
    let input = document.getElementById("opcion");
    let valor = input.opcion.trim();
    if (valor.length === 0){
        alert("No se ha proporcionado ningún valor");
    }else{
    sql += "(DEFAULT, '" + id +"', '" + valor + "')";
    console.log("SQL: " + sql);
    bd = "mysqli_connect('localhost', 'root', '', 'varlud');"
    //query = "mysqli_query(" + bd + ", " + sql + ");";
    //document.getElementById(insert).insertAdjacentHTML("afterend", query);
    }
}