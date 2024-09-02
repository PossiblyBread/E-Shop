<?php
include "../db_conn.php";
session_start();
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
    <div class="ticket-form">
        <h2>Submit a Ticket</h2>
        <form action="" method="post">

            <label for="Serial_Num">Serial Number</label>
            <input type="text" id="Serial_Num" name="Serial_Num" required>

            <label for="type">Ticket Type</label>
            <select id="type" name="type" required>
                <option value="Technical">Technical</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Billing">Billing</option>
                <option value="Assist_Req">Assistance Request</option>
            </select>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <button class="submit-button" type="submit" name="submit">Submit Ticket</button>
            <button class="cancel-button" type="button" onclick="window.history.back();">Cancel</button>
    </div>
</body>
</html>