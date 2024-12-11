// Function to fetch weather data based on the user's location or a search
function getWeatherData(location) {
    // Simulated weather data for testing purposes
    const weatherData = {
        location: location || 'Toronto',
        temperature: 15,  // example temperature in Celsius
        condition: 'Sunny',
        precipitation: '0%'
    };

    // Populate the weather details
    document.getElementById('location').innerText = weatherData.location;
    document.getElementById('temperature').innerText = weatherData.temperature;
    document.getElementById('condition').innerText = weatherData.condition;
    document.getElementById('precipitation').innerText = weatherData.precipitation;

    // Generate an outfit based on the weather
    suggestOutfit(weatherData.temperature, weatherData.condition);
}

// Function to suggest an outfit based on temperature and weather condition
function suggestOutfit(temperature, condition) {
    let outfit = '';
    let outfitTitle = '';
    let outfitLink = '#';

    if (temperature >= 20) {
        outfit = 'images/summer-outfit.jpg';  // Add the path to your summer outfit image
        outfitTitle = 'Light Summer Dress';
        outfitLink = 'https://example.com/summer-dress';
    } else if (temperature < 20 && condition === 'Rainy') {
        outfit = 'images/rainy-outfit.jpg';  // Add the path to your rainy outfit image
        outfitTitle = 'Raincoat and Boots';
        outfitLink = 'https://example.com/raincoat-boots';
    } else {
        outfit = 'images/fall-outfit.jpg';  // Add the path to your fall outfit image
        outfitTitle = 'Cozy Sweater and Jeans';
        outfitLink = 'https://example.com/cozy-sweater-jeans';
    }

    // Populate the outfit suggestion
    document.getElementById('outfit-image').src = outfit;
    document.getElementById('outfit-title').innerText = outfitTitle;
    document.getElementById('outfit-link').href = outfitLink;
}

// Event listener for the "Use My Current Location" button
document.getElementById('use-location-btn').addEventListener('click', function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            // Call getWeatherData with the geolocation coordinates (for now, we use Toronto as a placeholder)
            getWeatherData('Toronto');
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
});

// Event listener for the "Search a City" button
document.getElementById('search-city-btn').addEventListener('click', function() {
    const city = prompt("Enter a city:");
    if (city) {
        getWeatherData(city);
    }
});

// Initialize with default weather data for Toronto
getWeatherData('Toronto');
