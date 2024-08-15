<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "web_db";

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

        $sql = "INSERT INTO `web_db` (`id`, `last_name`, `first_name`, `email`, `phone_num`, `a_password`) 
                VALUES (NULL,'$last_name','$first_name','$email','$phone_num','$a_password')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location:Shop.php? msg=User Created Successfully!");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }   
    }

    if (isset($_POST['Update-Image'])) {
        $name = $_POST['name'];
        $totalFiles = count($_FILES['fileImg']['name']);
        $filesArray = array();

        for($i = 0; $i < $totalFiles; $i++){
            $imageName = $_FILES["fileImg"]["name"][$i];
            $tmpName = $_FILES["fileImg"]["tmp_name"][$i];

            $imageExtension = explode('.', $imageName);
            $imageExtension = strtolower(end($imageExtension));

            $newImageName = uniqid() . '.' . $imageExtension;

            move_uploaded_file($tmpName, 'uploads/' . $newImageName);
            $filesArray[] = $newImageName;
        }

        $filesArray = json_encode($filesArray);
        $query = "INSERT INTO images_db VALUES('', '$name', '$filesArray')";
        mysqli_query($conn, $query);
        echo
        "<script>
            alert('Successfully Added');
            document.location.href = 'index.php';
        </script>";
    }
    

    date_default_timezone_set('Asia/Singapore');
    function calculateTimeElapsed($upload_date_time) {
        $current_time = time();
        $upload_time = strtotime($upload_date_time);
        
        $elapsed_time = $current_time - $upload_time;

        if ($elapsed_time < 86400) {
            $hours = floor($elapsed_time / 3600);
            $minutes = floor(($elapsed_time % 3600) / 60);
            $seconds = $elapsed_time % 60;
            return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds); // Format as hours:minutes:seconds
        } else {
            $days = floor($elapsed_time / 86400);
            return $days . " day" . ($days != 1 ? "s" : ""); // Format as number of days
        }
    }
?>