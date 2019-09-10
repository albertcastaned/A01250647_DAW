<?php
    include_once("_header.html");
    require_once("util.php");

    //Ejercicio 1
    echo "<section><h1>Calcular Promedio:</h1><h2>Ejemplo 1: [-2, 0, 2, -5, 0.2, 5, 6, 10]</h2>";
    echo promedio([-2,0,2,-5,0.2,5,6,10]);
    echo "<h2>Ejemplo 2: [9, 9, 9, 9, 2, 34, 5, 2, 1, -2, 5, 6, 10]</h2>";
    echo promedio([9,9,9,9,2,34,5,2,1,-2,5,6,10]);
    echo "</section>";


    //Ejercicio 2
    echo "<section><h1>Obtener Mediana:</h1><h2>Ejemplo 1: [3,13,7,5,21,23,39,23,40,23,14,12,56,23,29]</h2>";
    echo mediana([3,13,7,5,21,23,39,23,40,23,14,12,56,23,29]);
    echo "<h2>Ejemplo 2: [3, 10, 36, 255, 79, 24, 5, 8]</h2>";
    echo mediana([3, 10, 36, 255, 79, 24, 5, 8]);
    echo "</section>";

    //Ejercicio 3
    echo "<section><h1>Lista de numeros:</h1><h2>Ejemplo 1: [3,13,7,5,21,23,39,23,40,23,14,12,56,23,29]</h2>";
    echo lista_numeros([3,13,7,5,21,23,39,23,40,23,14,12,56,23,29]);
    echo "<h2>Ejemplo 2: [5,9,10,20,50,20,40,95.2,-2.4,0,906,-4.5]</h2>";
    echo lista_numeros([5,9,10,20,50,20,40,95.2,-2.4,0,906,-4.5]);
    echo "</section>";


    //Ejercicio 4
    echo "<section><h1>Tabla de potencias:</h1><h2>Ejemplo 1: 5</h2>";
    echo tabla_potencias(5);
    echo "<h2>Ejemplo 2: 10</h2>";
    echo tabla_potencias(10);
    echo "</section>";


    //Ejercicio 5
    echo "<section><h1><a href='http://codeforces.com/contest/454/problem/B'>Little Pony and Sort By Shift: </a></h1><p>One day, Twilight Sparkle is interested in how to sort a sequence of integers a1, a2, ..., an in non-decreasing order. Being a young unicorn, the only operation she can perform is a unit shift. That is, she can move the last element of the sequence to its beginning:a1, a2, ..., an → an, a1, a2, ..., an - 1.
        Help Twilight Sparkle to calculate: what is the minimum number of operations that she needs to sort the sequence?</p>";

    echo "<h2>Ejemplo 1: <br>2<br>2 1</h2>";
    echo ponyShift(2,[2,1]);
    echo "<h2>Ejemplo 2: <br>3<br>1 3 2</h2>";
    echo ponyShift(3,[1,3,2]);
    echo "<h2>Ejemplo 3: <br>2<br>1 2</h2>";
    echo ponyShift(2,[1,2]);
    echo "</section>";
    include_once("cuestionario.html");
    include_once("_footer.html");
?>