<?php
ini_set('display_errors', 1);

// API URL to fetch character data
$api_url = 'https://dragonball-api.com/api/characters?limit=1000';

// Get the data from the API
$file = file_get_contents($api_url);

// Decode the JSON data
$data = json_decode($file, true);

// Check if data is decoded successfully
if ($data) {
  // Loop through each character
  foreach ($data['items'] as $item) {

    // Escape characters for security in HTML output
    $escaped_name = htmlspecialchars($item['name']);
    $escaped_image = htmlspecialchars($item['image']);
    $escaped_race = htmlspecialchars($item['race']);

    // Create the HTML structure for the small character card
    echo "<div class='small-card'>";
    echo "  <img src='$escaped_image' alt='$escaped_name'>";
    echo "  <h3>$escaped_name</h3>";
    echo "  <p><strong>Raza:</strong> $escaped_race</p>";
    echo "  <a href='index2.php?id=$item[id]'>Ver detalles</a>";
    echo "</div>";
  }
} else {
  // Handle API request error
  echo "Error: Unable to fetch character data from the API.";
}