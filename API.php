<?php

class API {
    function __construct(){
        $this->_BASE_URL_API = 'http://localhost:8000';
    }

    function getIncident(string $TOKEN, int $skip, int $limit){
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->_BASE_URL_API.'/incidents?token_api='.$TOKEN.'&skip='.strval($skip).'&limit='.strval($limit),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);
        return $response;
    
    }


}





