<?php
include_once('db_conn');
session_start();

    if (isset($_POST['submit'])) {
        $reg_ID = $_POST['reg_ID'];
        $name = $_POST['name'];

        if (isset($_FILES['pdf_file']['name'])) {
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];

            move_uploaded_file($file_tmp, "./uploads/" . $file_name);

            $insertquery = "INSERT INTO product_tb(reg_ID, title,attachments,sellfile) VALUES('$reg_ID','$name','$file_name', '0')";
            $iquery = mysqli_query($conn, $insertquery);
        } else {
        ?>
            <div class="alert alert-danger alert-dismissible
                fade show text-center">
                <a class="close" data-dismiss="alert" aria-label="close">×</a>
                <strong>Failed!</strong>
                File must be uploaded in PDF format!
            </div>
        <?php
    }}
?>
