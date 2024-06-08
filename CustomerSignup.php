<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from POST request
    $firstName = isset($_POST['firstName']) ? $_POST['firstName'] : "";
    $lastName = isset($_POST['lastName']) ? $_POST['lastName'] : "";
    $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "carrental";
    $response = array();

    // Create connection
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        $response['status'] = 'error';
        $response['message'] = "Connection failed: " . $conn->connect_error;
        echo json_encode($response);
        exit();
    }

    // Check if phone number or email already exists
    $stmt = $conn->prepare("SELECT * FROM customer WHERE phoneNumber=? OR email=?");
    $stmt->bind_param("ss", $phoneNumber, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $response['status'] = 'error';
        $response['message'] = 'Phone number or Email already exists';
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO customer (firstName, lastName, phoneNumber, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $phoneNumber, $email, $password);

        // Execute statement
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Registration successful';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Registration failed';
        }
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Output response
    echo json_encode($response);
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request';
    echo json_encode($response);
}
?>
