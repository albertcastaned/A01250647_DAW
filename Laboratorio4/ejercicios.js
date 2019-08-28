function tabla_potencias(limite = 10) {

    let resultado = '<table align="center"><tbody>';
    const potencia = 2;
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

function promedio_de_matriz(matriz)
{
    let arreglo_resultado = [];
    for(let renglon = 0; renglon < matriz.length; renglon++)
    {
        let promedio = 0;
        let renglon_numero_elementos = matriz[renglon].length;
        for(let columna = 0; columna < renglon_numero_elementos; columna++)
        {
            promedio+= matriz[renglon][columna];
        }
        arreglo_resultado.push(promedio / renglon_numero_elementos);
    }
    return arreglo_resultado;
}

function numero_inverso(numero_original)
{
    let inverso = 0;
    while( numero_original != 0)
    {
        inverso *= 10;
        inverso += numero_original % 10;
        numero_original = Math.floor(numero_original / 10);
    }
    return inverso;
}

//Ejercicio 1
document.write('<section id = "ej1">' + "<h2>Ejercicio 1</h2>");

let limite_usuario = prompt("Ingresa un numero: ");

let tabla_personalizada = tabla_potencias(limite_usuario);
document.write('<div style="overflow-x:auto;">' + tabla_personalizada + "</div></section>");

//Ejercicio 2
document.write('<section id = "ej2">' + "<h2>Ejercicio 2</h2>");

let numero_aleatorio_1 = Math.floor(Math.random() * 500);
let numero_aleatorio_2 = Math.floor(Math.random() * 500);

let resultado = numero_aleatorio_1 + numero_aleatorio_2;

let t0 = performance.now();
let respuesta_usuario = prompt("Ingresa el resultado de " + numero_aleatorio_1 + " + " + numero_aleatorio_2);
let t1 = performance.now();


document.write(respuesta_usuario == resultado ? '<span class = "correcto">Tu respuesta es correcta</span><br/>' : '<span class = "incorrecto">Tu respuesta es incorrecta</span><br>');
document.write("Tu tiempo de respuesta fue de " + tiempo_en_segundos(t0,t1) + " segundos</section>");

//Ejercicio 3
document.write('<section id = "ej3">' + "<h2>Ejercicio 3</h2><br>Arreglo: [ 5, 4, -2, -2, 0, -0, 42, -599, 2, 0.9, -0.1]<br>");
document.write(contar_tipo_numeros([ 5, 4, -2, -2, 0, -0, 42, -599, 2, 0.9, -0.1]) + "<br><br>Arreglo: [ 0, 0, -2, -100, -10.1, 9, 9, 2, 4.2, 0.1, 0.001 ]<br>" + contar_tipo_numeros([ 0, 0, -2, -100, -10.1, 9, 9, 2, 4.2, 0.1, 0.001 ]) + "<br></section>");

//Ejercicio 4
document.write('<section id = "ej4">' + "<h2>Ejercicio 4</h2><br>Matriz: [ [10,2,5,5.9,9,4,6],[0,0,0],[-5,5,4,0,9,6],[82,50,60,100,40,90,66,55] ]<br>");
document.write(promedio_de_matriz([[10,2,5,5.9,9,4,6],[0,0,0],[-5,5,4,0,9,6],[82,50,60,100,40,90,66,55]]) + "<br><br>Matriz: [ [1000,1000,1000,1,500], [40,20,300,10,30],[50,50,51,50],[95,94,60,70,84] ]<br>" + promedio_de_matriz([[1000,1000,1000,1,500], [40,20,300,10,30],[50,50,51,50],[95,94,60,70,84]]) + "<br></section>");

//Ejercicio 5
document.write('<section id = "ej5">' + "<h2>Ejercicio 5</h2><br>Numero: 28145920 <br>");
document.write(numero_inverso(28145920) + "<br>Numero: 420195224<br>" + numero_inverso(420195224) + "<br></section>");