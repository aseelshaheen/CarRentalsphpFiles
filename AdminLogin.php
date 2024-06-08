<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data
    $usernamePost = isset($_POST['username']) ? $_POST['username'] : "";
    $passwordPost = isset($_POST['password']) ? $_POST['password'] : "";
    
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
    
    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username=? AND password=?");
    if ($stmt === false) {
        $response['status'] = 'error';
        $response['message'] = "Prepare failed: " . $conn->error;
        echo json_encode($response);
        exit();
    }
    
    $stmt->bind_param("ss", $usernamePost, $passwordPost);
    
    // Execute statement
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();
    
    // Check if user exists
    if ($result->num_rows > 0) {
        $response['status'] = 'success';
        $response['message'] = 'Login successful';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid username or password. Please sign up.';
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
