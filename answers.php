<?php 

    ######################################################
    ####################### @BAMII #######################
    ######################################################
    function bamiiConvertCurrency($amount, $from, $to){
        $conv_id = "{$from}_{$to}";
        $string = file_get_contents("https://free.currencyconverterapi.com/api/v5/convert?q=$conv_id&compact=y");
        $json_a = json_decode($string, true);
    
        #return $json_a[strtoupper($conv_id)]['val'];
        #return $amount;
        return $amount * $json_a[strtoupper($conv_id)]['val'];
    }

    function bamiiChuckNorris() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.icndb.com/jokes/random",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));
        
        $response = curl_exec($curl);
        $a =json_decode($response, true);
        curl_close($curl);

        return $a['value']['joke'];
    }

    function bamiiTellTime($data) {
        if(strpos($data, 'in')) {
           return "Sorry i can't tell you the time somewhere else right now";
        } else {
            return 'The time is:' . date("h:i");
        }
    }

    function bamiiCountryDetails($data) {
        $country_arr = explode(' ', $data);
        $country_index= array_search('details', $country_arr) + 1;
        $country = $country_arr[$country_index];
        $country_temp = str_replace('details', "", $data);
        $country2 = trim($country_temp);

        $string = 'http://api.worldweatheronline.com/premium/v1/search.ashx?key=1bdf77b815ee4259942183015181704&query='. $country2 .'&num_of_results=2&format=json';

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $string,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));
        
        $response = curl_exec($curl);
        $a =json_decode($response, true);
        curl_close($curl);

        $longitude = $a['search_api']['result'][0]['longitude'];
        $latitude = $a['search_api']['result'][0]['latitude'];
        $name = $a['search_api']['result'][0]['areaName'][0]['value'];
        $country_name = $a['search_api']['result'][0]['country'][0]['value'];
        $population = $a['search_api']['result'][0]['population'];

        
        return('
            '. ($name ? 'Name :'. $name . '<br />' : null) .'
            Country: ' . $country_name . ' <br />
            Latitude: ' . $latitude . ' <br />
            Longitude: ' . $longitude . ' <br />
            Population: ' . $population . '<br />
        ');
    }

    ###################### END BAMII #####################

?>