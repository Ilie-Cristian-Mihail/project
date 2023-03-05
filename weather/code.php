<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['city'])) {
        $apiKey = '20e2b1bcb6b2fa82fd2ae9e7fd20870b';
        $city = $_POST['city'];
        $url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey";
        $response = file_get_contents($url);
        $data = json_decode($response);
        $temperature = round($data->main->temp - 273.15);
        $humidity = $data->main->humidity;
        $windSpeed = $data->wind->speed;

        // construct a JSON object with the data
        $json = array(
            'temperature' => $temperature,
            'humidity' => $humidity,
            'windSpeed' => $windSpeed
        );

        // return the JSON object as the response
        header('Content-Type: application/json');
        echo json_encode($json);
    }
}


?>