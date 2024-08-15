<?php
    require "db_conn.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Upload</title>
    </head>
    <body>
        <form action="" method="post" enctype="multipart/form-data">
        Name :
        <input type="text" name="name" required> <br>
        Image :
        <input type="file" name="fileImg[]" accept=".jpg, .jpeg, .png" required multiple> <br>
        <button type = "submit" name = "submit">Submit</button>
        </form>
        <br>
        <a href="index.php">Index</a>
    </body>
</html>