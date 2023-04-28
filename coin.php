<?php

session_start();

$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://coinlore-cryptocurrency.p.rapidapi.com/api/tickers/?start=0&limit=18",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: coinlore-cryptocurrency.p.rapidapi.com",
		"X-RapidAPI-Key: 2f0aba25d6msh91c09a7c4d417d8p1faaeejsn05392bf0cb64",
		"content-type: application/octet-stream"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$data = json_decode($response);
    $_SESSION['json'] = $data->data;
    header('Location:index.php');
    exit();
    
}