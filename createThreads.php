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


if($_REQUEST['assistant'] && $_REQUEST['thread'])
{

    $assistantId = $_REQUEST['assistant'];
    $threadId = $_REQUEST['thread'];
    $email = $_REQUEST['email'];


        $sql_check = "SELECT id FROM threads WHERE thread = ?";
        $stmt = $conn->prepare($sql_check);
        $stmt->bind_param("s", $threadId);
        $stmt->execute();
        $result = $stmt->get_result();
       
        // Step 2: If the thread doesn't exist, insert it
        
        if ($result->num_rows == 0) {


            if($_REQUEST['verified'] == 1)
            {
                $sql_insert = "INSERT INTO threads (assistant, thread,email,verified) VALUES ('$assistantId', '$threadId','$email',1)";

            }
            else{
                $sql_insert = "INSERT INTO threads (assistant, thread,email,verified) VALUES ('$assistantId', '$threadId','$email',0)";
            }








            // Thread does not exist, insert the new thread
            
            $results = $conn->query($sql_insert); 
            if($results == TRUE)
            {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Thread created successfully'
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

