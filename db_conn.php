<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "user_account";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if (!$conn) {
    die("Connection Failed " . mysqli_connect_error()); 
}

//for registering a new user
if (isset($_POST['Submit'])) {
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $phone_num = $_POST['phone_num'];
    $a_password = $_POST['a_password']; //a_password for account password

    $sql = "INSERT INTO `user_profile` (`id`, `last_name`, `first_name`, `email`, `phone_num`, `a_password`) 
            VALUES (NULL,'$last_name','$first_name','$email','$phone_num','$a_password')";

    $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location:Shop.php? msg=User Created Successfully!");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
 }

?>