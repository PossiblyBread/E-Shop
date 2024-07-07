<?php
session_start();
include "db_conn.php";

    if (!isset($_POST['i_email']) || !isset($_POST['i_password'])) {
        header("Location: Home.php");
        exit();
    }

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //i_email i = short for input
    $i_email = validate($_POST['i_email']);
    $i_password = validate($_POST['i_password']);

    if (empty($i_email)) {
        header("Location: index.php?error=User Name is required");
        exit();
    }

    if (empty($i_password)) {
        header("Location: index.php?error=Password is required");
        exit();
    }

    if ($i_email == 'admin@gmail.com' && $i_password == 'admin1234') {
        header("Location: Shop.php");
        exit();
    }

    $sql = "SELECT * FROM user_profile WHERE email = '$i_email' AND a_password = '$i_password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['email'] === $i_email && $row['a_password'] === $i_password) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            header("Location: Shop.php");
            exit();
        }
    }

    header("Location: Home.php?error=Incorect User name or password");
exit();
?>
