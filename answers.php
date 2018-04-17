<?php



















//bytenaija time function
function bytenaija_time($location){
    $curl = curl_init();
    $geocodeUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=". $location . "&sensor=true&key=AIzaSyCWLZLW__GC8TvE1s84UtokiVH_XoV0lGM";
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $geocodeUrl,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));

    $response = curl_exec($curl);
    $response = json_decode($response, true);
    //$lat = $response->results;
    $response = $response['results'][0]['geometry'];
    
    $response = $response["location"];
    $lat = $response["lat"];
    $lng = $response["lng"];
    $timestamp = time(); ;
   
    $url = "https://maps.googleapis.com/maps/api/timezone/json?location=" . $lat ."," . $lng ."&timestamp=" .$timestamp. "&key=AIzaSyBk2blfsVOf_t1Z5st7DapecOwAHSQTi4U"; 
   
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $responseJson = curl_exec($curl);
    curl_close($curl);
    $response = json_decode($responseJson);
    $timezone = $response->timeZoneId;
    $date = new DateTime("now", new DateTimeZone($timezone));
    echo "The time in ".ucwords($location) . " is " . $date->format('d M, Y h:i:s A');
    
} 
?>