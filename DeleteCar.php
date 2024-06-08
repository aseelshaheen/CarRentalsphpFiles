<?php
include 'Connection.php';

// Check if the car ID is provided
if(isset($_POST['carID'])) {
    $carID = $_POST['carID'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to delete the car by ID
    $sql = "DELETE FROM car WHERE carID = $carID";

    if ($conn->query($sql) === TRUE) {
        echo "Car deleted successfully";
    } else {
        echo "Error deleting car: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Car ID is not provided";
}
?>
