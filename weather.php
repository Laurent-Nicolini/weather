<?php
session_start();
// URL API
// https://api.openweathermap.org/data/2.5/weather?q={city name}&appid={API key}&units=metrics&lang=fr
if($_POST['city']){

    $url = "https://api.openweathermap.org/data/2.5/weather?q={$_POST['city']}&units=metric&lang=fr&appid=df0188d6a307b8899037923ed02ecf30";

    $get_content = file_get_contents($url);

    $json = json_decode($get_content);

    var_dump($json);
    $_SESSION['city_name'] = $json->name;
    $_SESSION['weather'] = $json->weather[0]->main;
    $_SESSION['desc'] = $json->weather[0]->description;
    var_dump($_SESSION['desc']);
    exit();
}

