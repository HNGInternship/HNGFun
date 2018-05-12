<?php
    $googleBaseURL = "https://speech.googleapis.com/v1beta1/speech:syncrecognize?key=AIzaSyDAUWqKOBYP-Y1LeuD3lFRAy9jiZwRpQP8";
   
   
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) && $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'POST') {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');
        }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $audio = $_POST['audio'];
        
        $provider = $_POST['provider'];
        
        if($provider == 'google'){
            return googleTranscribe($audio);
        }else if($provider == 'amazon'){
            return amazonTransribe($audio);
        }
        
        function googleTranscribe($audio){
            $data = array(
                "config" => array(
                    "encoding" => "LINEAR16",
                    "sample_rate" => 44000,
                    "language_code" => "en-US"
                ),
               "audio" => array(
                    "content" => $audio,
                )
            );

            $data_string = json_encode($data);                                                              

            $ch = curl_init($googlespeechURL);                                                                      
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
               'Content-Type: application/json',                                                                                
               'Content-Length: ' . strlen($data_string))                                                                       
            );                                                                                                                   

            $result = curl_exec($ch);
            $result_array = json_decode($result, true);
            
            echo json_encode($result_array);
            exit();
        }
    }
  }
?>