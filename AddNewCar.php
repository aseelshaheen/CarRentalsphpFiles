<?php
require 'Connection.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if POST variables are set and not empty
if (isset($_POST['carBrand']) && isset($_POST['carModel']) && isset($_POST['price']) && isset($_POST['color']) && isset($_POST['status'])) {
    $carBrand = $_POST['carBrand'];
    $carModel = $_POST['carModel'];
    $price = $_POST['price'];
    $color = $_POST['color'];
    $status = $_POST['status'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO car (carBrand, carModel, price, color, status) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $carBrand, $carModel, $price, $color, $status);

    // Execute statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Missing required POST data<br>";
    echo "carBrand: " . (isset($_POST['carBrand']) ? $_POST['carBrand'] : 'NOT SET') . "<br>";
    echo "carModel: " . (isset($_POST['carModel']) ? $_POST['carModel'] : 'NOT SET') . "<br>";
    echo "price: " . (isset($_POST['price']) ? $_POST['price'] : 'NOT SET') . "<br>";
    echo "color: " . (isset($_POST['color']) ? $_POST['color'] : 'NOT SET') . "<br>";
    echo "status: " . (isset($_POST['status']) ? $_POST['status'] : 'NOT SET') . "<br>";
}

$conn->close();
?>
