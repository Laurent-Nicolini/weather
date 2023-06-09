<?php
session_start();
// URL API
// https://api.openweathermap.org/data/2.5/weather?q={city name}&appid={API key}&units=metrics&lang=fr
if($_POST['city']){

    $url = "https://api.openweathermap.org/data/2.5/weather?q={$_POST['city']}&units=metric&lang=fr&appid=df0188d6a307b8899037923ed02ecf30";

    $get_content = file_get_contents($url);

    $json = json_decode($get_content);

    $_SESSION['city'] = $_POST['city'];
    $_SESSION['city_name'] = $json->name;
    $_SESSION['weather'] = $json->weather[0]->main;
    $_SESSION['desc'] = $json->weather[0]->description;
    $_SESSION['temp'] = $json->main->temp;
    $_SESSION['wind'] = $json->wind->speed;
    
    header('Location:index.php');
    exit();
}

