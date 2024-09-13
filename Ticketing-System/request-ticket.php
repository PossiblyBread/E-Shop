<?php
include "../db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // For the PHP AJAX request
    $data = json_decode(file_get_contents("php://input"), true);

    if ($data) {
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $phone_num = $data['phone_num'];
        $serial_num = 100;  // Assuming a fixed serial number
        $type = $data['type'];
        $description = $data['description'];
        $t_status = "Pending";
        $escalation_stage = "P1";

        // Insert into database
        $sql = "INSERT INTO `tickets`(`id`, `first_name`, `last_name`, `phone_num`, `serial_num`,
                                `type`, `description`, `t_status`, `escalation_stage`) 
                VALUES (NULL, '$first_name', '$last_name', '$phone_num', '$serial_num', 
                        '$type', '$description', '$t_status', '$escalation_stage')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Return success message
            echo json_encode(["success" => true, "message" => "Ticket submitted successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "Failed: " . mysqli_error($conn)]);
        }
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Request</title>
    <link rel="stylesheet" type="text/css" href="../styles/request-ticket_style.css"/>
</head>
<body>
    <!-- Form for submitting tickets -->
    <div class="ticket-form">
        <h2>Submit a Ticket</h2>
        <form id="form">
            <!-- Hidden field for Web3Forms access key -->
            <input type="hidden" name="access_key" value="2bde6572-687f-47ce-aa2d-a6c4671ef752">

            <label for="first_name">First Name</label>
            <input type="text" id="first_name" name="first_name" required>

            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="phone_num">Phone Number</label>
            <input type="text" id="phone_num" name="phone_num" required>

            <label for="type">Ticket Type</label>
            <select id="type" name="type" required>
                <option value="Technical">Technical</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Billing">Billing</option>
                <option value="Assist_Req">Assistance Request</option>
            </select>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <button class="submit-button" type="submit">Submit Ticket</button>
            <button class="cancel-button" type="button" onclick="window.history.back();">Cancel</button>
        </form>
        <div id="result"></div> <!-- Result display -->
    </div>
</body>

<script>
    const form = document.getElementById('form');
    const result = document.getElementById('result');

    form.addEventListener('submit', function(e) {
        e.preventDefault();  // Prevent the default form submission
        const formData = new FormData(form);
        const jsonObject = Object.fromEntries(formData);
        const json = JSON.stringify(jsonObject);
        
        result.innerHTML = "Submitting, please wait...";

        // Send data to Web3Forms API
        fetch('https://api.web3forms.com/submit', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: json
        })
        .then(async (response) => {
            let web3Json = await response.json();
            if (response.status === 200) {
                result.innerHTML = "Form submitted to Web3Forms successfully!";
            } else {
                result.innerHTML = "Web3Forms: " + web3Json.message;
            }
        })
        .catch(error => {
            result.innerHTML = "Web3Forms submission failed!";
            console.error(error);
        });

        // Send data to PHP backend for database insertion
        fetch('send-data.php', {  // Make sure to replace this with the actual PHP file path
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: json
        })
        .then(async (response) => {
            const phpJson = await response.json();
            if (phpJson.success) {
                result.innerHTML += "<br>Data also saved to the database successfully!";
            } else {
                result.innerHTML += "<br>Database error: " + phpJson.message;
            }
        })
        .catch(error => {
            result.innerHTML += "<br>Failed to save data to the database.";
            console.error(error);
        });

        form.reset();  // Reset the form after submission
    });
</script>
</html>
