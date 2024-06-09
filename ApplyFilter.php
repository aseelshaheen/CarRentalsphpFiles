<?php
require 'Connection.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize an empty array to store the results
$cars = array();

// Query to select rows from the cars table with optional brand and model filters
$sql = "SELECT * FROM car";
if (isset($_GET['brand'])) {
    $brand = $_GET['brand'];
    $sql .= " WHERE carBrand = '$brand'";
}
if (isset($_GET['model'])) {
    $model = $_GET['model'];
    $sql .= (isset($_GET['brand']) ? " AND" : " WHERE") . " carModel = '$model'";
}

// Perform the query
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Loop through each row in the result set
    while ($row = $result->fetch_assoc()) {
        // Add the row to the cars array
        $cars[] = $row;
    }
}

// Convert the array to JSON format
$json_response = json_encode($cars);

// Output the JSON response
echo $json_response;

// Close the database connection
$conn->close();
?>
