//Ejecutar al cargar JS
esconderInformacionValidador();

function mostrarInformacionValidador()
{
    let seccionInfoPassword = document.getElementById("seccionCondiciones");
    seccionInfoPassword.style.visibility = "visible";
}
function esconderInformacionValidador()
{
    let seccionInfoPassword = document.getElementById("seccionCondiciones");
    seccionInfoPassword.style.visibility = "hidden";
}


function comprar()
{
    let reciboSeccion = document.getElementById("recibo");

    let nombres = document.getElementsByName("nombreProducto");

    let precios = document.getElementsByName("precio");

    let cantidades = document.getElementsByName("cantidad");

    let total = 0;
    for(let i = 0;i < cantidades.length; i++)
    {
        if(isNaN(cantidades[i].valueAsNumber) || cantidades[i].valueAsNumber <= 0)
        {
            reciboSeccion.innerHTML = "<h2 class='incorrecto'>Elige una cantidad valida para cada producto</h2>";
            return;
        }
    }

    reciboSeccion.innerHTML= "<h2>Recibo:<br>";

    for(let i=0;i < cantidades.length;i++)
    {
        reciboSeccion.innerHTML+= "<h3>" + nombres[i].innerText + " x " + cantidades[i].valueAsNumber + ": $" + precios[i].innerText * cantidades[i].valueAsNumber + "</h3><br>";
        total+= precios[i].innerText * cantidades[i].valueAsNumber;
    }

    reciboSeccion.innerHTML+= "<h3>Subtotal: $" + total + "</h3><br><h3>IVA: $" + total * 0.16 + "</h3><br><h3>Total: $" + total + total * 0.16 + "</h3><br>";

}

function calcular()
{
    let resultadoCalculo = document.getElementById("resultadoCalculo");
    let operador1 = document.getElementById("operador1").valueAsNumber;
    let operador2 = document.getElementById("operador2").valueAsNumber;

    let operacion = document.getElementById("espacioDrop");
    resultadoCalculo.innerHTML = "";

    if(operacion.childElementCount <= 0)
    {
        resultadoCalculo.innerHTML+= "<h2 class='incorrecto'>Llena el campo de operación con una imagen</h2>";
        return;
    }
    let operacionID = operacion.firstElementChild;

    if(isNaN(operador1) || isNaN(operador2))
    {
        resultadoCalculo.innerHTML+= "<h2 class='incorrecto'>Llena los dos campos con un valor</h2>";
        return;
    }
    switch(operacionID)
    {
        case sumaDrag:
            resultadoCalculo.innerHTML+= "<h2 class='correcto'>" + (operador1 + operador2) + "</h2>";
            break;
        case restaDrag:
            resultadoCalculo.innerHTML+= "<h2 class='correcto'>" + (operador1 - operador2) + "</h2>";
            break;
        case divDrag:
            if(operador2 == 0)
            {
                resultadoCalculo.innerHTML+= "<h2 class='incorrecto'>No se puede dividir entre 0</h2>";
                return;
            }
            resultadoCalculo.innerHTML+= "<h2 class='correcto'>" + (operador1 / operador2) + "</h2>";
            break;
        case multiDrag:
            resultadoCalculo.innerHTML+= "<h2 class='correcto'>" + (operador1 * operador2) + "</h2>";
            break;
    }
}

function permitirDrop(ev) {
    ev.preventDefault();
  }
  
  function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
  }
  
  function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    //Checar si ya hay elemento
    if(ev.target.tagName=="IMG")
        return;
    ev.target.appendChild(document.getElementById(data));
  }