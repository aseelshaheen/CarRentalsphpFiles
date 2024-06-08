<?php
include 'Connection.php';

// Check if all required POST data is present
if(isset($_POST['carID']) && isset($_POST['carBrand']) && isset($_POST['carModel']) && isset($_POST['price']) && isset($_POST['color']) && isset($_POST['status'])) {
    // Extract POST data
    $carID = $_POST['carID'];
    $carBrand = $_POST['carBrand'];
    $carModel = $_POST['carModel'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $status = $_POST['status'];

    // Prepare SQL statement to update car record
    $sql = "UPDATE car SET carBrand='$carBrand', carModel='$carModel', price='$price', color='$color', status='$status' WHERE carID='$carID'";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Car record updated successfully";
    } else {
        echo "Error updating car record: " . $conn->error;
    }
} else {
    echo "Missing required POST data";
}

// Close database connection
$conn->close();
?>
