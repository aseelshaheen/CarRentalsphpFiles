<?php
require 'Connection.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to select all rows from the cars table
$sql = "SELECT * FROM car";

// Perform the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Initialize an empty array to store the results
    $cars = array();

    // Loop through each row in the result set
    while ($row = $result->fetch_assoc()) {
        // Add the row to the cars array
        $cars[] = $row;
    }

    // Convert the array to JSON format
    $json_response = json_encode($cars);

    // Output the JSON response
    echo $json_response;
} else {
    // No rows found in the cars table
    echo "No cars found";
}

// Close the database connection
$conn->close();
?>
