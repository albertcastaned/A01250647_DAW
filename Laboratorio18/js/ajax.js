/**
 * Función para crear el objeto de la petición asíncrona. 
 * Maneja las diferencias entre distintos navegadores.
 **/
function getRequestObject() {

    //Para manejar las diferencias entre navegadores
    if (window.XMLHttpRequest) {
        // Mozilla, Opera, Safari, Chrome, IE 7+
        return (new XMLHttpRequest());
    } else if (window.ActiveXObject) {
        // IE 6-
        return (new ActiveXObject("Microsoft.XMLHTTP"));
    } else {
        // Navegadores que no soportan AJAX
        return (null);
    }
}

/**
 * Aquí es donde ocurre la interacción asíncrona
 **/
function sendRequest() {

    //Se crea el objetivo de la petición asíncrona
    request = getRequestObject();

    //Si el navegador soporta AJAX, se hace la petición asíncrona 
    //y se maneja-------------------------------------------------
    if (request != null) {
        //Parámetro que se le va a mandar al servidor
        var userInput = document.getElementById('userInput');

        //Dirección del servidor que manejará la petición
        var url = 'controller.php?pattern=' + userInput.value;

        //Hacer la petición
        request.open('GET', url, true);

        //Se define qué hacer cuando hay un cambio de estado en la petición
        request.onreadystatechange =
            function () {
                /* La petición pasa por varios varios estados:
                 * 0: No inicializada
                 * 1: Conexión establecida
                 * 2: Petición recibida
                 * 3: Respuesta en proceso
                 * 4: Finalizada
                 *
                 * Cuando se recibe la respuesta (estado 4) se 
                 * actualiza una parte de la página con el texto que 
                 * se recibe de la respuesta. Para el resto de los 
                 * estado, no estamos definiendo una acción, pero
                 * se podría hacer.
                 */
                if (request.readyState == 4) {
                    var ajaxResponse = document.getElementById('ajaxResponse');
                    ajaxResponse.innerHTML = request.responseText;
                    ajaxResponse.style.visibility = "visible";
                    console.log("Conexion recibida");
                }

            };

        //Envía la petición asíncrona al servidor
        request.send(null);
    } //------------------------------------------------------------
}


/**
 * Modifica la interface de usuario de tal forma que cuando se 
 * selecciona un valor de una lista, la lista desaparece y el 
 * valor de la lista se pone en el input.
 * Esto es puro javascript, NO es una interacción asíncrona. 
 * La interacción asíncrona ocurrió en la función sendRequest, 
 * esta función se manda a llamar en sendRequest para actualizar la 
 * interface del usuario.
 **/
function selectValue() {

    var list = document.getElementById("list");
    var userInput = document.getElementById("userInput");
    var ajaxResponse = document.getElementById('ajaxResponse');
    userInput.value = list.options[list.selectedIndex].text;
    ajaxResponse.style.visibility = "hidden";
    userInput.focus();
}