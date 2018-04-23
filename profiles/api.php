<?php

    $googleBaseURL = "https://speech.googleapis.com/v1beta1/speech:syncrecognize?key=AIzaSyDAUWqKOBYP-Y1LeuD3lFRAy9jiZwRpQP8";
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
       // $audio = $_POST['audio'];
        
        //this fetches the uploaded audio file 
       $audio = file_get_contents( $_FILES['audio']['tmp_name']);
        $uploadled_file = base64_encode($audio);
        
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
                    "sample_rate" => $bitRate,
                    "language_code" => "en-IN"
                ),
               "audio" => array(
                    "content" => base64_encode($uploaded_file),
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
            
            return json_encode($result_array);
            exit();
        }
    }
?>