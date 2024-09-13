<?php
// Include your database connection
include "../db_conn.php";

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the raw POST data (JSON from JavaScript fetch)
    $data = json_decode(file_get_contents("php://input"), true);

    // Ensure that data is not empty
    if ($data) {
        // Extract the data from the JSON object
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $phone_num = $data['phone_num'];
        $serial_num = 100;  // Assuming a fixed serial number
        $type = $data['type'];
        $description = $data['description'];
        $t_status = "Pending";  // Default status
        $escalation_stage = "P1";  // Default escalation stage

        // Prepare the SQL query to insert the data into the 'tickets' table
        $sql = "INSERT INTO `tickets` (`id`, `first_name`, `last_name`, `phone_num`, `serial_num`, `type`, `description`, `t_status`, `escalation_stage`) 
                VALUES (NULL, '$first_name', '$last_name', '$phone_num', '$serial_num', '$type', '$description', '$t_status', '$escalation_stage')";

        // Execute the query
        $result = mysqli_query($conn, $sql);

        // Check if the query was successful
        if ($result) {
            // Return a JSON response indicating success
            echo json_encode(["success" => true, "message" => "Ticket submitted successfully"]);
        } else {
            // Return a JSON response indicating failure
            echo json_encode(["success" => false, "message" => "Failed to submit ticket: " . mysqli_error($conn)]);
        }
    } else {
        // Return an error if no data was sent
        echo json_encode(["success" => false, "message" => "No data received"]);
    }
} else {
    // Return an error if the request method is not POST
    echo json_encode(["success" => false, "message" => "Invalid request method"]);
}
?>
