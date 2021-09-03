<?php

    if(isset($_POST['location'])){
        $ubicacion = $_POST['location'];
    }


    $curl = curl_init(); //inicia la sesión cURL

     
    $apiCall = 'https://www.metaweather.com/api/location/search/?query='.$ubicacion.'';

    curl_setopt_array($curl, array(
        CURLOPT_URL => $apiCall, //url a la que se conecta
        CURLOPT_RETURNTRANSFER => true, //devuelve el resultado como una cadena del tipo curl_exec
        CURLOPT_FOLLOWLOCATION => true, //sigue el encabezado que le envíe el servidor
        CURLOPT_ENCODING => "", // permite decodificar la respuesta y puede ser"identity", "deflate", y "gzip", si está vacío recibe todos los disponibles.
        CURLOPT_MAXREDIRS => 10, // Si usamos CURLOPT_FOLLOWLOCATION le dice el máximo de encabezados a seguir
        CURLOPT_TIMEOUT => 30, // Tiempo máximo para ejecutar
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, // usa la versión declarada
        CURLOPT_CUSTOMREQUEST => "GET", // el tipo de petición, puede ser PUT, POST, GET o Delete dependiendo del servicio

    )); //curl_setopt_array configura las opciones para una transferencia cURL
    
    $response = curl_exec($curl);// respuesta generada
    $err = curl_error($curl); // muestra errores en caso de existir
    
    curl_close($curl); // termina la sesión 
    
    if ($err) {
        echo "cURL Error #:" . $err; // mostramos el error
    } else {
        echo $response; // en caso de funcionar correctamente
    }



?>