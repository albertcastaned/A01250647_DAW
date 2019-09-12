<!DOCTYPE html>
<html>
    <head>
        <title>Laboratorio 10</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

    <body>
        <header>
            <h1>Laboratorio 10</h1>
        </header>

        <section>
            <?php echo $mensaje ?>
        </section>

        <section>
            <h2>Cuestionario</h2>
            <ul>
                <li>
                    <h2>¿Por qué es una buena práctica separar el controlador de la vista?</h2>
                    <p>Permite la reutilizacion de codigo, y al separar el codigo por componentes se tiene una mejor organizacion.</p>
                </li>
                <li>
                    <h2>Aparte de los arreglos $_POST y $_GET, ¿qué otros arreglos están predefinidos en php y cuál es su función?
                    </h2>
                    <p>
                        <ul>
                            <li>
                                $_SESSION: Continee variables de la sesion actual. 
                            </li>
                            <li>
                                $_FILES: Contiene un arreglo de objetos publicados con $_POST.
                            </li>
                            <li>
                                $_SERVER: Contiene informacion como direcciones de scripts, y headers.
                            </li>
                        </ul>
                    </p>
                </li>
                <li>
                    <h2>Explora las funciones de php, y describe 2 que no hayas visto en otro lenguaje y que llamen tu atención.</h2>
                    <p>
                        <ul>
                            <li>
                                implode: Une una collecion de elementos de un arreglo con una conexion auxiliar como una comma por ejemplo.
                            </li>

                            <li>
                                array_merge: Une dos arreglos automaticamente. Si se repiten elementos, no se agrega uno nuevo. 
                            </li>
                        </ul>
                    </p>
                </li>
                <li>
                    <h2>¿Qué es XSS y cómo se puede prevenir?</h2>
                    <p>
                        Cross-site Scripting se refiere a los ataques cuando un texto plano se representa como un elemento HTML o Javascript cuando no deberia. Para evitarlo, se utiliza el metodo htmlspecialchars para convertir a texto plano. Tambien, se puede implementar una funcion para validar que no haya caracteres ilegales.
                    </p>
                </li>

            </ul>
        </section>
    </body>
</html>