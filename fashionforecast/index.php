<?php
$apiKey = "1327e19c314da5a25207ef94ad790417";

// Get weather data- coordinates or searched city
$lat = isset($_GET['lat']) ? $_GET['lat'] : null;
$lon = isset($_GET['lon']) ? $_GET['lon'] : null;
$city = isset($_GET['city']) ? $_GET['city'] : null;

$weather = null;
$error = null;

// connect to database
$db = new mysqli('localhost', 'root', 'root', 'ssense');

// db errors
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch data from ssense/outfitgenerator table
$query = "SELECT * FROM outfitgenerator";
$result = $db->query($query);

// Initialize outfits array from database
$outfits = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $outfits[] = [
            "image_url" => $row['Image'],
            "name" => $row['ProductName'],
            "link" => $row['URL'],
            "min_temp" => $row['TemperatureRange'],
            "max_temp" => $row['TemperatureRange'],
            "description" => $row['Category'],
        ];
    }
} else {
    echo "Error fetching outfits: " . $db->error;
}

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
                $season = "";
                if ($temp >= 11 && $temp <= 15) {
                    $season = "fall";
                } elseif ($temp >= -10 && $temp <= 10) {
                    $season = "winter";
                } elseif ($temp >= 16 && $temp <= 20) {
                    $season = "spring";
                } elseif ($temp >= 21 && $temp <= 40) {
                    $season = "summer";
                }

                return $outfit['min_temp'] == $season; 
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
