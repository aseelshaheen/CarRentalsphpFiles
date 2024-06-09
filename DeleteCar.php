<?php
include 'Connection.php';
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $carID = $_GET['id'];

    $sql = "DELETE FROM car WHERE carID = '$carID'";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}

$conn->close();
?>