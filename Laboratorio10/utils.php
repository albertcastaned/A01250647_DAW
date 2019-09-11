<?php

    function tieneNumero($contraseña)
    {
        $re = '/\\d/';
        return preg_match($re, $contraseña) > 0;
    }

    function tieneCaracterEspecial($contraseña)
    {
        $re = '/[@#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/';
        return preg_match($re, $contraseña) > 0;
    }

    function tieneMayuscula($contraseña)
    {
        $re = '/(?=[A-Z])([A-Z\s]+)/';
        return preg_match($re, $contraseña) > 0;
    }

    function validarContra($contra1, $contra2)
    {
        if($contra1 == "" || $contra2 == "")
            return "<h2 class = 'incorrecto'>Un campo de texto esta en blanco</h2>";

        if($contra1 != $contra2)
            return "<h2 class = 'incorrecto'>Contraseña diferente al campo de confirmacion</h2>";
        
        if(!tieneNumero($contra1))
            return "<h2 class = 'incorrecto'>La contraseña no tiene un numero";

        if(!tieneCaracterEspecial($contra1))
            return "<h2 class = 'incorrecto'>La contraseña no tiene un caracter especial";

        if(!tieneMayuscula($contra1))
            return "<h2 class = 'incorrecto'>La contraseña no tiene una letra mayuscula";

        if(strlen($contra1) < 6)
            return "<h2 class = 'incorrecto'>La contraseña no tiene mas de 5 caracteres";

        for($i = 0;$i < strlen($contra1); $i++)
        {
            if($contra1[$i] == " ")
                return "<h2 class='incorrecto'>No se permite espacios para la contraseña</h2>";
        }
        return "<h2 class='correcto'>La contraseña es valida</h2>";
    }
?>