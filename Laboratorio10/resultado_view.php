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

        <section id="cuestionario">
            <h2>Cuestionario</h2>
            <ul>
                <li>
                    <h3>¿Cuáles son las diferencias entre los posibles valores de la propiedad position?</h3>
                    <ul>
                        <li>
                            Static: Posición por defecto no afectada por las propiedades top, bottom, left, o right. Se posiciona de acuerdo a la estructura de la pagina.
                        </li>
                        <li>
                            Relative: Posición relativa a la posición original. La diferencia en posición de la original se ajusta con top, bottom, left, y right.
                        </li>
                        <li>
                            Fixed: Posición esta ajustada a la vista del navegador, es decir se mantiene en el mismo lugar aunque el usuario haga scroll a la pagina.
                        </li>
                        <li>
                            Absolute: Posición relativa a una posición asignada. Similar a la Relative pero se asigna una posición especifica como pivote.
                        </li>
                        <li>
                            Sticky: Depende de la posición del scroll del usuario. Puede ser Relative o Fixed de acuerdo a la posición del scroll.
                        </li>
                    </ul>
                </li>
                <li>
                    <h3>¿Cuáles son los valores estándar para la propiedad visibility?</h3>
                    <ul>
                        <li>
                            Visible
                        </li>
                        <li>
                            Hidden
                        </li>
                        <li>
                            Collapse
                        </li>
                        <li>
                            Initial
                        </li>
                        <li>
                            Inherit
                        </li>

                    </ul>
                </li>
                <li>
                    <h3>¿Qué es el zIndex y para qué sirve?</h3>
                    <p>Asigna el orden de como se dibujan los elementos en la pagina. Es decir, un elemento con zIndex alto aparecerá enfrente de todos los elementos. Esto nos sirve para acomodar elementos que aparecen juntos</p>
                </li>
            </ul>
        </section>
    </body>
</html>