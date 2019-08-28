
function tieneNumero(contraseña)
{
    return /\d/.test(contraseña);
}

function tieneCaracterEspecial(contraseña)
{
    return /[!@#$%^&*(),.?":{}|<>]/.test(contraseña);
}

function tieneMayuscula(contraseña)
{
    return /[A-Z\s]+/.test(contraseña);
}
function validarContra()
{
    let pass1 = document.getElementById("password1").value;
    let pass2 = document.getElementById("password2").value;

    let resultDiv = document.getElementById("validadorResultado");

    if(pass1 == "" || pass2 == "")
    {
        resultDiv.innerHTML = "<h2 class='incorrecto'>Un campo de texto esta en blanco</h2>";
        return;
    }
    if(pass1 != pass2)
    {
        resultDiv.innerHTML = "<h2 class='incorrecto'>Contraseña diferente al campo de confirmacion</h2>";
        return;
    }
    if(!tieneNumero(pass1))
    {
        resultDiv.innerHTML = "<h2 class='incorrecto'>La contraseña no tiene un numero</h2>";
        return;
    }
    if(!tieneCaracterEspecial(pass1))
    {
        resultDiv.innerHTML = "<h2 class='incorrecto'>La contraseña no tiene un carácter especial</h2>";
        return;
    }
    if(!tieneMayuscula(pass1))
    {
        resultDiv.innerHTML = "<h2 class='incorrecto'>La contraseña no tiene una letra mayuscula</h2>";
        return;
    }
    if(pass1.length < 6)
    {
        resultDiv.innerHTML = "<h2 class='incorrecto'>La contraseña no tiene mas de 5 caracteres</h2>";
        return;
    }
    for(let i = 0;i < pass1.length; i++)
    {
        if(pass1[i] == " ")
        {
            resultDiv.innerHTML = "<h2 class='incorrecto'>No se permite espacios para la contraseña</h2>";
            return;
        }
    }
    resultDiv.innerHTML = "<h2 class='correcto'>La contraseña es valida</h2>";

}

function calcular()
{
    let resultadoCalculo = document.getElementById("resultadoCalculo");
    let operador1 = document.getElementById("operador1").valueAsNumber;
    let operador2 = document.getElementById("operador2").valueAsNumber;

    let operacion = document.getElementById("operacion").value;
    resultadoCalculo.innerHTML = "";

    if(isNaN(operador1) || isNaN(operador2))
    {
        resultadoCalculo.innerHTML+= "<h2 class='incorrecto'>Llena los dos campos con un valor</h2>";
        return;
    }
    switch(operacion)
    {
        case "Suma":
            resultadoCalculo.innerHTML+= "<h2 class='correcto'>" + (operador1 + operador2) + "</h2>";
            break;
        case "Resta":
            resultadoCalculo.innerHTML+= "<h2 class='correcto'>" + (operador1 - operador2) + "</h2>";
            break;
        case "División":
            if(operador2 == 0)
            {
                resultadoCalculo.innerHTML+= "<h2 class='incorrecto'>No se puede dividir entre 0</h2>";
                return;
            }
            resultadoCalculo.innerHTML+= "<h2 class='correcto'>" + (operador1 / operador2) + "</h2>";
            break;
        case "Multiplicación":
            resultadoCalculo.innerHTML+= "<h2 class='correcto'>" + (operador1 * operador2) + "</h2>";
            break;
    }
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