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


if($_REQUEST['assistant'] && $_REQUEST['thread'] && $_REQUEST['chatmsg'])
{

    $assistantId = $_REQUEST['assistant'];
    $threadId = $_REQUEST['thread'];
    $chatmsg = $_REQUEST['chatmsg'];


    $sql = "SELECT * FROM threads WHERE assistant = '$assistantId' AND thread = '$threadId'";
    $result = $conn->query($sql);  
            
        if ($result->num_rows == 1) {
            // Thread does not exist, insert the new thread

           $sql_update = "UPDATE threads SET last_msg = '$chatmsg', updated_at = CURRENT_TIMESTAMP WHERE thread = '$threadId'";

            $results = $conn->query($sql_update);
            
            if($results == TRUE)
            {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Thread updated successfully'
                ]);
            } else if($results == FALSE){
                // If insertion failed, return an error message in JSON
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to create thread'
                ]); 

            }
           
        }


}

