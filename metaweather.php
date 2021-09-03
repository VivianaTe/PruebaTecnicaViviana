<?php

    if(isset($_POST['location'])){
        $ubicacion = $_POST['location'];
    }


    $curl = curl_init(); 

     
    $apiCall = 'https://www.metaweather.com/api/location/search/?query='.$ubicacion.'';

    curl_setopt_array($curl, array(
        CURLOPT_URL => $apiCall, 
        CURLOPT_RETURNTRANSFER => true, 
        CURLOPT_FOLLOWLOCATION => true, 
        CURLOPT_ENCODING => "", 
        CURLOPT_MAXREDIRS => 10, 
        CURLOPT_TIMEOUT => 30, 
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, 
        CURLOPT_CUSTOMREQUEST => "GET", 

    )); 
    
    $response = curl_exec($curl);
    $err = curl_error($curl); 
    
    curl_close($curl); 
    
    if ($err) {
        echo "cURL Error #:" . $err; 
    } else {
        echo $response; 
    }



?>
