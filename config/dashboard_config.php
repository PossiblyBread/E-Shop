<?php
    include "../db_conn.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);
        $h_password = mysqli_real_escape_string($conn, $_POST['h_password']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);

        $sql_insert = "INSERT INTO `accounts` (`id`, `last_name`, `first_name`, `email`, `phone_num`, `h_password`, `role`) 
                        VALUES (NULL, '$last_name', '$first_name', '$email', '$phone_num', '$h_password', '$role')";
        if (!mysqli_query($conn, $sql_insert)) {
            die("Error inserting record: " . mysqli_error($conn));
        }
    }
    
    $sql_select = "SELECT * FROM accounts";
    $result = mysqli_query($conn, $sql_select);

?>