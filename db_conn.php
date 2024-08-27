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
        $h_password = password_hash($a_password, PASSWORD_DEFAULT);
        $role = $_POST['role'] = "user";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email format.");
        }

        $sql = "INSERT INTO `accounts` (`id`, `last_name`, `first_name`, `email`, `phone_num`, `h_password`, `role`) 
                VALUES (NULL,'$last_name','$first_name','$email','$phone_num','$h_password','$role')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location:Dashboard.php? msg=User Created Successfully!");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }   
    }
    if (isset($_POST['pay-update'])) {
        $user_id = $_POST['user_id'];
        $user_name = $_POST['user_name'];
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $payment_type = $_POST['payment_type'];
        $due_date = $_POST['due_date'];
        $due_to_be_paid = $_POST['due_to_be_paid'];
        $due_paid = $_POST['due_paid'];
        $due_missed = $_POST['due_missed'];
        $due_paid_date = $_POST['due_paid_date'];
        $dues_remaining = $_POST['dues_remaining'];
        $due_status = $_POST['due_status'];

        $sql = "INSERT INTO `ledger_tb` (`id`, `user_id`, `user_name`, `product_id`, `product_name`, 
                        `product_price`, `payment_type`, `due_date`, `due_to_be_paid`, `due_paid`, 
                        `due_missed`, `due_paid_date`, `dues_remaining`, `due_status`) 
                VALUES (NULL, '$user_id', '$user_name', '$product_id', '$product_name', 
                        '$product_price', '$payment_type', '$due_date', '$due_to_be_paid', 
                        '$due_paid', '$due_missed', '$due_paid_date', '$dues_remaining', '$due_status')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location:Dashboard.php? msg=User Created Successfully!");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }   
    }

    if (isset($_FILES['images'])) {
        // File upload variables
        $p_brand = $_POST['p_brand'];
        $p_model = $_POST['p_model'];
        $p_year = $_POST['p_year'];
        $p_type = $_POST['p_type'];
        $p_frame_size = $_POST['p_frame_size'];
        $p_wheel_size = $_POST['p_wheel_size'];
        $p_weight = $_POST['p_weight'];
        $p_motor_type = $_POST['p_motor_type'];
        $p_motor_power = $_POST['p_motor_power'];
        $p_top_speed = $_POST['p_top_speed'];
        $p_pedal_assist_levels = $_POST['p_pedal_assist_levels'];
        $p_throttle = $_POST['p_throttle'];
        $p_battery_type = $_POST['p_battery_type'];
        $p_battery_capacity = $_POST['p_battery_capacity'];
        $p_range = $_POST['p_range'];
        $p_charge_time = $_POST['p_charge_time'];
        $p_gears = $_POST['p_gears'];
        $p_brakes = $_POST['p_brakes'];
        $p_suspension = $_POST['p_suspension'];
        $p_tires = $_POST['p_tires'];
        $p_frame_material = $_POST['p_frame_material'];
        $p_fork = $_POST['p_fork'];
        $p_handlebars = $_POST['p_handlebars'];
        $p_display = $_POST['p_display'];
        $p_lighting = $_POST['p_lighting'];
        $p_connectivity = $_POST['p_connectivity'];
        $p_fenders = $_POST['p_fenders'];
        $p_rack = $_POST['p_rack'];
        $p_kickstand = $_POST['p_kickstand'];
        $p_lock = $_POST['p_lock'];
        $p_accessories = $_POST['p_accessories'];
        $p_warranty = $_POST['p_warranty'];
        $p_torque = $_POST['p_torque'];
        $p_max_rider_weight = $_POST['p_max_rider_weight'];
        $p_water_resistance = $_POST['p_water_resistance'];
        $p_base_price = $_POST['p_base-price'];
        $p_optional_features = $_POST['p_optional_features'];
        
        $file_name = $_FILES['images']['name'];
        $tempname = $_FILES['images']['tmp_name'];
        $folder = 'products_tb/' . $file_name;
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($tempname, $folder)) {
            // Insert file path into database
            $sql = "INSERT INTO products_tb (id, images, p_brand, p_model, p_year, p_type, p_frame_size, p_wheel_size, 
                        p_weight, p_motor_type, p_motor_power, p_top_speed, p_pedal_assist_levels, 
                        p_throttle, p_battery_type, p_battery_capacity, p_range, p_charge_time, 
                        p_gears, p_brakes, p_suspension, p_tires, p_frame_material, p_fork, 
                        p_handlebars, p_display, p_lighting, p_connectivity, p_fenders, p_rack, 
                        p_kickstand, p_lock, p_accessories, p_warranty, p_torque, 
                        p_max_rider_weight, p_water_resistance, p_base_price, p_optional_features) 
                    
                    VALUES (NULL, '$folder', '$p_brand', '$p_model', '$p_year', '$p_type', '$p_frame_size', '$p_wheel_size', 
                        '$p_weight', '$p_motor_type', '$p_motor_power', '$p_top_speed', '$p_pedal_assist_levels', 
                        '$p_throttle', '$p_battery_type', '$p_battery_capacity', '$p_range', '$p_charge_time', 
                        '$p_gears', '$p_brakes', '$p_suspension', '$p_tires', '$p_frame_material', '$p_fork', 
                        '$p_handlebars', '$p_display', '$p_lighting', '$p_connectivity', '$p_fenders', '$p_rack', 
                        '$p_kickstand', '$p_lock', '$p_accessories', '$p_warranty', '$p_torque', 
                       '$p_max_rider_weight', '$p_water_resistance', '$p_base_price', '$p_optional_features')";
            $result = mysqli_query($conn, $sql);
    
            // Check if the query was successful
            if ($result) {
                header("Location: Admin/Dashboard.php? msg=Success!");
            } else {
                echo "Failed to insert into the database: " . mysqli_error($conn);
            }
        } else {
            echo "Failed to upload the image.";
        }
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