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
    resultado += "</tbody></table><hr/>";
    return resultado;
}
function tiempo_en_segundos(tiempo_inicial,tiempo_final)
{
    return (tiempo_final - tiempo_inicial)/1000;
}

//Ejercicio 1
let limite_usuario = prompt("Ingresa un numero: ");
let tabla_personalizada = tabla_potencias(limite_usuario);
document.write(tabla_personalizada);

//Ejercicio 2
let numero_aleatorio_1 = Math.floor(Math.random() * 500);
let numero_aleatorio_2 = Math.floor(Math.random() * 500);

let resultado = numero_aleatorio_1 + numero_aleatorio_2;

let t0 = performance.now();
let respuesta_usuario = prompt("Ingresa el resultado de " + numero_aleatorio_1 + " + " + numero_aleatorio_2);
let t1 = performance.now();


document.write(respuesta_usuario == resultado ? "Tu respuesta es correcta<hr/>" : "Tu respuesta es incorrecta<br>");
document.write("Tu tiempo de respuesta fue de " + tiempo_en_segundos(t0,t1) + " segundos</hr>");