function tabla_potencias(limite = 10) {

    let resultado = "<table><tbody>";
    let potencia = 2;
    resultado += "<caption>Tabla de numeros al cuadrado y al cubo</caption>"
    for (let i = 1; i <= potencia + 1; i++) {
        resultado += "<tr>";
        for (let j = 1; j <= limite; j++) {
            resultado += "<td>";
            resultado += Math.pow(j,i);
            resultado += "</td>";
        }
        resultado += "</tr>";
    }
    resultado += "</tbody></table><hr/>";
    return resultado;
}

let limite_usuario = prompt("Ingresa un numero: ");
let tabla_personalizada = tabla_potencias(limite_usuario);
document.write(tabla_personalizada);