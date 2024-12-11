<?php
$apiKey = "1327e19c314da5a25207ef94ad790417";

// Get weather data either from coordinates or a searched city
$lat = isset($_GET['lat']) ? $_GET['lat'] : null;
$lon = isset($_GET['lon']) ? $_GET['lon'] : null;
$city = isset($_GET['city']) ? $_GET['city'] : null;

// Define the outfits array
$outfits = [
    [
        "image_url" => "sweater.jpg", // Diesel Valari Sweater
        "name" => "Diesel Valari Sweater",
        "link" => "https://www.ssense.com/en-ca/women/product/diesel/yellow-m-valari-tn-sweater/15802521",
        "min_temp" => 11,
        "max_temp" => 15,
        "description" => "Cozy sweater for chilly weather.",
    ],
    [
        "image_url" => "jacket.jpg", // Diesel Blue W-Caby Faux-Fur Jacket
        "name" => "Diesel Blue W-Caby Faux-Fur Jacket",
        "link" => "https://www.ssense.com/en-ca/women/product/diesel/blue-w-caby-faux-fur-jacket/16591661",
        "min_temp" => -10,
        "max_temp" => 10,
        "description" => "Warm jacket for cold weather.",
    ],
    [
        "image_url" => "tshirt.jpg", // Black 'GIVENCHY' Archetype T-shirt
        "name" => "Black 'GIVENCHY' Archetype T-shirt",
        "link" => "https://www.ssense.com/en-ca/women/product/givenchy/black-givenchy-archetype-t-shirt/16965881",
        "min_temp" => 16,
        "max_temp" => 20,
        "description" => "Casual t-shirt for mild weather.",
    ],
    [
        "image_url" => "tank.jpg", // Pink Esmé Tank Top
        "name" => "Pink Esmé Tank Top",
        "link" => "https://www.ssense.com/en-ca/women/product/flore-flore/pink-esme-tank-top/16742681",
        "min_temp" => 21,
        "max_temp" => 40,
        "description" => "Tank top for warm, sunny days.",
    ]
];

$weather = null;
$error = null;

if ($lat && $lon) {
    // Fetch weather data based on coordinates
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey&units=metric";
} elseif ($city) {
    // Fetch weather data based on city name
    $city2 = urlencode($city);
    $apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=$city2&appid=$apiKey&units=metric";
}

if (isset($apiUrl)) {
    $weatherData = @file_get_contents($apiUrl);
    if ($weatherData) {
        $weather = json_decode($weatherData, true);
    } else {
        $error = "Failed to fetch weather data. Please check your network or API key.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Forecast</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Fashion Forecast</h1>
    <h2>Effortless Outfits, Whatever the Weather.</h2>

    <!-- Form for searching a location -->
    <form method="GET" action="index.php">
        <break>
        <input type="text" id="city" name="city" placeholder="Enter city name" required>
        <button type="submit">Search</button>
    </form>

    <!-- Button for using geolocation -->
    <button onclick="getGeolocation()">Use My Current Location</button>

    <div id="weather">
        <?php
        if ($weather) {
            $temp = $weather['main']['temp'];
            echo "<h2>Current Weather</h2>";
            echo "<p><strong>Location:</strong> " . $weather['name'] . "</p>";
            echo "<p><strong>Temperature:</strong> " . $temp . "°C</p>";
            echo "<p><strong>Condition:</strong> " . $weather['weather'][0]['description'] . "</p>";

            // Filter outfits based on the temperature
            $filteredOutfits = array_filter($outfits, function ($outfit) use ($temp) {
                return $temp >= $outfit['min_temp'] && $temp <= $outfit['max_temp'];
            });

            if (!empty($filteredOutfits)) {
                echo "<h2>Recommended Outfits</h2>";
                foreach ($filteredOutfits as $outfit) {
                    echo "<div class='outfit'>";
                    echo "<img src='" . $outfit['image_url'] . "' alt='" . $outfit['name'] . "'>";
                    echo "<p>" . $outfit['description'] . "</p>";
                    echo "<a href='" . $outfit['link'] . "' class='buy-btn' target='_blank'>Buy Now</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No outfits found for this temperature range.</p>";
            }
        } elseif ($error) {
            echo "<p style='color:red;'>$error</p>";
        } else {
            echo "<p>Enter a city name or use your location to get started.</p>";
        }
        ?>
    </div>

    <script>
        function getGeolocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        const lat = position.coords.latitude;
                        const lon = position.coords.longitude;

                        // Redirect to the current script with latitude and longitude
                        window.location.href = `index.php?lat=${lat}&lon=${lon}`;
                    },
                    function (error) {
                        alert('Unable to retrieve your location. Please try again.');
                    }
                );
            } else {
                alert('Geolocation is not supported by your browser.');
            }
        }
    </script>

</body>
</html>
