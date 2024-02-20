
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<!-- <style>
    body{
        background-image: url('/assets/image_weather.jpg');
    }
</style> -->
<body>
    <center><h1 style="padding-top:10px; color:white;">Weather App</h1></center>
    <br>
    <div>
        <form action="index.php" method="post">
            Enter City <input type="text" name="city_name" id="city_name" placeholder="Enter City name">
            <?php

$api_id = yourapiid;
if($_SERVER["REQUEST_METHOD"] == "POST" ){
    $city = $_POST["city_name"];
    
}

$apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$api_id";

    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);
    if ($data['cod'] == 200) {
    // Extract relevant weather information
    $temperature = $data['main']['temp'];
    $description = $data['weather'][0]['description'];
    $icon = $data['weather'][0]['icon'];
    $temp = $temperature - 275.15;
    echo"<p>City : $city</p>";
    echo "<p>Temperature: $temp &deg;C</p>";
    echo "<p>Description: $description </p>";
    
} else {
    // Display an error message
    echo "<p>Error retrieving weather data</p>";
}
?>

        </form>
        
    </div>
</body>
</html>