<?php
session_start();

if(isset($_SESSION['city'])){
    $city = $_SESSION['city'];
    $weather = $_SESSION['weather'];
    $wind = $_SESSION['wind'];
    $city_name = $_SESSION['city_name'];
    $desc = $_SESSION['desc'];
    $temp = $_SESSION['temp'];
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intégration d'API</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar navbar-light bg-light sticky-top">
    <span class="navbar-brand my-2 mx-auto h1">INTEGRATION API</span>
    </nav>
    
    <div class="container">
        <br>
        <div class="row">
            <div class="weather border rounded">
                <form action="weather.php" method="POST">
                    <label for="city">Choisissez votre ville</label>
                    <input type="text" name="city" id="city" placeholder="<?= isset($city_name) ? $city_name : 'Entrez une ville...'?>">
                    <button type="submit">Envoyer</button>
                </form>
                <br>
                <?php
                if (isset($_SESSION['city'])){ ?>
                <div class="card m-auto" style="width: 10rem;">
                    <img class="card-img-top" src="
                    <?php
                        switch ($weather) {
                            case 'Clear':
                                echo "images/sun.png";
                                break;
                            case 'Clouds':
                                echo "images/cloud.png";
                                break;
                            case 'Storm':
                                echo "images/storm.png";
                                break;
                            case 'Sun_cloud':
                                echo "images/sun_cloud.png";
                                break;
                            case 'Rain':
                                echo "images/rain.png";
                                break;
                            case 'Snow':
                                echo "images/snow.png";
                                break;
                                                                
                            default:
                            echo "images/sun_cloud.png";
                                break;
                        } ?>
                    " 
                    alt="Météo du jour sur <?= $city_name ?>" title="Météo du jour sur <?= $city_name ?>">
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            <?= $city_name ?>
                        </h5>
                        <h5 class="card-title">
                            <?= $desc ?>
                        </h5>
                        <p class="card-text">Température: 
                            <?= $temp ?> °C
                        </p>
                        <p class="card-text">Vitesse du vent: 
                            <?= $wind ?> Km/h
                        </p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="exchange border rounded">
                API Bourse
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="row">
            <div class="sports border rounded">
                API Sports
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>