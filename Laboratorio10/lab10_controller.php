<?php

    function _e($string)
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }
    function camposVacios()
    {
        return (empty($_POST['nombre']) || empty($_POST['cliente']) || empty($_POST['precio']) || empty($_POST['fechaPedido']) || empty($_POST['fechaEntrega']));
    }

    function arePOST()
    {
        return isset($_POST['nombre']) && isset($_POST['cliente']) && isset($_POST['precio']) && isset($_POST['fechaPedido']) && isset($_POST['fechaEntrega']);
    }

    function fechaEntregaEsMayor()
    {
        return($_POST['fechaPedido'] < $_POST['fechaEntrega']);
    }

    function guardarDatos()
    {
        //Guardar datos en JSON para simplicar el laboratorio
        $miArchivo = "datos.json";
        $arreglo = array();

        try{
            $datosForma = array(
                'nombreProducto'=> $_POST['nombre'],
                'nombreCliente'=> $_POST['cliente'],
                'precio'=> $_POST['precio'],
                'fechaPedido'=> $_POST['fechaPedido'],
                'fechaEntrega'=> $_POST['fechaEntrega']
            );

            if(file_get_contents($miArchivo) != null)
            {
                $jsondata = file_get_contents($miArchivo);

                $arreglo = json_decode($jsondata,true);
            }

            array_push($arreglo, $datosForma);

            $jsondata = json_encode($arreglo, JSON_PRETTY_PRINT);

            if(file_put_contents($miArchivo, $jsondata))
                return true;
            else
                return false;
        }catch(Exception $e)
        {
            return false;
        }
    }

    function desplegarConsulta()
    {
        $miArchivo = "datos.json";
        
        try{
            if(file_get_contents($miArchivo) != null)
            {
                $jsondata = file_get_contents($miArchivo);

                $productos = json_decode($jsondata,true);

                $resultado = "";
                foreach($productos as $valor) 
                {
                    $resultado .= "<h3>Nombre del producto: " . _e($valor['nombreProducto']) . "</h3>";
                    $resultado .= "<h3>Nombre del cliente: " . _e($valor['nombreCliente']) . "</h3>";
                    $resultado .= "<h3>Precio: $" . _e($valor['precio']) . "</h3>";
                    $resultado .= "<h3>Fecha de Pedido: " . _e($valor['fechaPedido']) . "</h3>";
                    $resultado .= "<h3>Fecha de Entrega: " . _e($valor['fechaEntrega']) . "</h3>";
                    $resultado .= "<hr>";
                }
                return $resultado;
            }

        }catch(Exception $e)
        {
            return "<h2 class='incorrecto'>Error en la consulta del archivo</h2>";
        }
        
    }


    $mensaje = "";

    //POST
    if(arePOST())
    {

        if(camposVacios())
        {
            $mensaje = "<h2 class='incorrecto'>Error: Hay campos en la forma sin llenar</h2>";
        }
        else if(!fechaEntregaEsMayor())
        {
            $mensaje = "<h2 class='incorrecto'>Error: La fecha de entrega debe ser posterior a la fecha de pedido</h2>";
        }
        else if(!guardarDatos())
        {
            $mensaje = "<h2 class='incorrecto'>Error: Hubo un error al guardar los datos</h2>";
        }
        else{
            $mensaje = "<h2 class='correcto'>La venta se ha registrado exitosamente</h2>";
            $mensaje .= "<h3>Nombre del producto: " . _e($_POST['nombre']) . "</h3>";
            $mensaje .= "<h3>Nombre del cliente: " . _e($_POST['cliente']) . "</h3>";
            $mensaje .= "<h3>Precio: $" . _e($_POST['precio']) . "</h3>";
            $mensaje .= "<h3>Fecha de Pedido: " . _e($_POST['fechaPedido']) . "</h3>";
            $mensaje .= "<h3>Fecha de Entrega: " . _e($_POST['fechaEntrega']) . "</h3>";
        }

    //GET
    }else{
        $mensaje = desplegarConsulta();
    }
    include_once("resultado_view.php");

?>