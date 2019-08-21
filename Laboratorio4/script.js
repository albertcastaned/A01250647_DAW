function tabla_potencias(limite = 10) {

    let resultado = '<table align="center"><tbody>';
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
    resultado += "</tbody></table>";
    return resultado;
}
function tiempo_en_segundos(tiempo_inicial,tiempo_final)
{
    return (tiempo_final - tiempo_inicial)/1000;
}

function contar_tipo_numeros(arreglo)
{
    let negativos = 0;
    let ceros = 0;
    let positivos = 0;

    for(let i = 0; i < arreglo.length; i++)
    {
        if(arreglo[i] > 0)
            positivos++;
        else if(arreglo[i] < 0)
            negativos++;
        else
            ceros++;
    }
    return "Positivos: " + positivos + ", Negativos: " + negativos + ", Ceros: " + ceros;
}
//Ejercicio 1
document.write('<div class = "ejercicio">' + "<h2>Ejercicio 1</h2>");

let limite_usuario = prompt("Ingresa un numero: ");
let tabla_personalizada = tabla_potencias(limite_usuario);
document.write('<div style="overflow-x:auto;">' + tabla_personalizada + "</div></div>");

//Ejercicio 2
document.write('<div class = "ejercicio">' + "<h2>Ejercicio 2</h2>");

let numero_aleatorio_1 = Math.floor(Math.random() * 500);
let numero_aleatorio_2 = Math.floor(Math.random() * 500);

let resultado = numero_aleatorio_1 + numero_aleatorio_2;

let t0 = performance.now();
let respuesta_usuario = prompt("Ingresa el resultado de " + numero_aleatorio_1 + " + " + numero_aleatorio_2);
let t1 = performance.now();


document.write(respuesta_usuario == resultado ? "Tu respuesta es correcta<hr/>" : "Tu respuesta es incorrecta<br>");
document.write("Tu tiempo de respuesta fue de " + tiempo_en_segundos(t0,t1) + " segundos</div>");

//Ejercicio 3
document.write('<div class = "ejercicio">' + "<h3>Ejercicio 3</h2><br>Arreglo: [ 5, 4, -2, -2, 0, -0, 42, -599, 2, 0.9, -0.1]<br>");
document.write(contar_tipo_numeros([ 5, 4, -2, -2, 0, -0, 42, -599, 2, 0.9, -0.1]) + "<br></div>")