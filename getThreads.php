<?php

header("Access-Control-Allow-Origin: *");  // Or specify a domain: 'http://yourdomain.com'
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");  // Specify allowed methods
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    
    // If the request method is OPTIONS, return a 200 status without further processing
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        http_response_code(200);
        exit();
    }
// Database configuration
$servername = "localhost";  // Database host, usually 'localhost'
$username = "topscbtk_mdev1";         // Database username
$password = "DRT5V+kT_lDo";             // Database password (empty if no password)
$dbname = "topscbtk_mdev1";  // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch threads where assistant = 'Rahul'


if($_REQUEST['assistant'] && $_REQUEST['email'])
{

    $assistantId = $_REQUEST['assistant'];
    $email = $_REQUEST['email'];
    $verified = $_REQUEST['verified'];


    if($_REQUEST['verified'] == 1)
    {
        $sql = "SELECT * FROM threads WHERE assistant = '$assistantId' AND email = '$email' AND verified = '$verified'";

    }
    else{
        $sql = "SELECT * FROM threads WHERE assistant = '$assistantId' AND last_msg !='' AND email = '$email'";
    }
    
    $result = $conn->query($sql);  
    
    if ($result->num_rows > 0) {
        // Initialize an array to store the result
        $threads = array();
    
        // Fetch each row and store it in the array
        while ($row = $result->fetch_assoc()) {
            $threads[] = $row;
        }            
        header('Content-Type: application/json');
    
        // Output the result in JSON format
        echo json_encode($threads);
    }


}



