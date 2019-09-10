<?php
    function promedio($arreglo)
    {
        $total = 0;
        for($i = 0; $i < count($arreglo); $i++)
        {
            $total += $arreglo[$i];
        }

        return $total / count($arreglo);
    }

    function mediana($arreglo)
    {
        $resultado;
        sort($arreglo);

        $numero_elementos = count($arreglo);
        $medio = $numero_elementos / 2;

        if($numero_elementos % 2 == 0)
        {

            $resultado = ($arreglo[$medio] + $arreglo[$medio - 1]) / 2;
        }else{
            $resultado = $arreglo[$numero_elementos / 2];
        }
        
        return $resultado;
    }

    function lista_numeros($arreglo)
    {
        $resultado = "<ol>";

        for($i = 0; $i < count($arreglo); $i++)
        {
            $resultado .= "<li>" . $arreglo[$i] . "</li>";
        }

        $resultado .= "</ol><ul><li>" . promedio($arreglo) . "</li><li>" . mediana($arreglo) . "</li><li>[";

        sort($arreglo);

        
        for($i = 0; $i < count($arreglo); $i++)
        {
            $resultado .=" " . $arreglo[$i];
        }

        $resultado .= " ]</li><li>[";

        rsort($arreglo);
        for($i = 0; $i < count($arreglo); $i++)
        {
            $resultado .=" " . $arreglo[$i];
        }

        $resultado .= " ]</li></ul>";
        return $resultado;
    }

    function tabla_potencias($potenciaLimite)
    {
        $resultado = "<table><tbody>";
        $potencia = 2;
        $resultado .= "<caption>Tabla de numeros al cuadrado y al cubo</caption>";

        for($i = 1; $i <= $potencia + 1; $i++)
        {
            $resultado .= "<tr>";
            for($j = 1; $j <= $potenciaLimite; $j++)
            {
                $resultado .= "<td>";
                $resultado .= pow($j,$i);
                $resultado .= "</td>";
            }
            $resultado .= "</tr>";
        }

        $resultado .= "</tbody></table>";
        return $resultado;
    }

    function ponyShift($numPonies, $ponies)
    {
        $count = 0;
        $ordenado = true;
        $resultado = "";
        for($i = 1; $i < $numPonies; $i++)
        {
            if($ponies[$i] < $ponies[$i-1])
            {
                if($ordenado)
                {
                    $ordenado = false;
                    $count+=1;
                }else{
                    $resultado = "-1";
                    return $resultado;
                }
            }else if(!$ordenado)
            {
                $count+=1;
            }
        }

        if($count == 0 || $ponies[0] >= $ponies[$numPonies - 1])
        {
            $resultado = $count;
        }else{
            $resultado = "-1";
        }
        return $resultado;
    }
?>