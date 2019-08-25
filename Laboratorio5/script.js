
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