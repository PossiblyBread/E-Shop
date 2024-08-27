<?php
session_start();
include "../db_conn.php"; // Ensure this file contains your database connection code

// Handle form submission and file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['images'])) {
    // Sanitize and retrieve form data
    $p_brand = mysqli_real_escape_string($conn, $_POST['p_brand']);
    $p_model = mysqli_real_escape_string($conn, $_POST['p_model']);
    $p_year = mysqli_real_escape_string($conn, $_POST['p_year']);
    $p_type = mysqli_real_escape_string($conn, $_POST['p_type']);
    $p_frame_size = mysqli_real_escape_string($conn, $_POST['p_frame_size']);
    $p_wheel_size = mysqli_real_escape_string($conn, $_POST['p_wheel_size']);
    $p_weight = mysqli_real_escape_string($conn, $_POST['p_weight']);
    $p_motor_type = mysqli_real_escape_string($conn, $_POST['p_motor_type']);
    $p_motor_power = mysqli_real_escape_string($conn, $_POST['p_motor_power']);
    $p_top_speed = mysqli_real_escape_string($conn, $_POST['p_top_speed']);
    $p_pedal_assist_levels = mysqli_real_escape_string($conn, $_POST['p_pedal_assist_levels']);
    $p_throttle = mysqli_real_escape_string($conn, $_POST['p_throttle']);
    $p_battery_type = mysqli_real_escape_string($conn, $_POST['p_battery_type']);
    $p_battery_capacity = mysqli_real_escape_string($conn, $_POST['p_battery_capacity']);
    $p_range = mysqli_real_escape_string($conn, $_POST['p_range']);
    $p_charge_time = mysqli_real_escape_string($conn, $_POST['p_charge_time']);
    $p_gears = mysqli_real_escape_string($conn, $_POST['p_gears']);
    $p_brakes = mysqli_real_escape_string($conn, $_POST['p_brakes']);
    $p_suspension = mysqli_real_escape_string($conn, $_POST['p_suspension']);
    $p_tires = mysqli_real_escape_string($conn, $_POST['p_tires']);
    $p_frame_material = mysqli_real_escape_string($conn, $_POST['p_frame_material']);
    $p_fork = mysqli_real_escape_string($conn, $_POST['p_fork']);
    $p_handlebars = mysqli_real_escape_string($conn, $_POST['p_handlebars']);
    $p_display = mysqli_real_escape_string($conn, $_POST['p_display']);
    $p_lighting = mysqli_real_escape_string($conn, $_POST['p_lighting']);
    $p_connectivity = mysqli_real_escape_string($conn, $_POST['p_connectivity']);
    $p_fenders = mysqli_real_escape_string($conn, $_POST['p_fenders']);
    $p_rack = mysqli_real_escape_string($conn, $_POST['p_rack']);
    $p_kickstand = mysqli_real_escape_string($conn, $_POST['p_kickstand']);
    $p_lock = mysqli_real_escape_string($conn, $_POST['p_lock']);
    $p_accessories = mysqli_real_escape_string($conn, $_POST['p_accessories']);
    $p_warranty = mysqli_real_escape_string($conn, $_POST['p_warranty']);
    $p_torque = mysqli_real_escape_string($conn, $_POST['p_torque']);
    $p_max_rider_weight = mysqli_real_escape_string($conn, $_POST['p_max_rider_weight']);
    $p_water_resistance = mysqli_real_escape_string($conn, $_POST['p_water_resistance']);
    $p_base_price = mysqli_real_escape_string($conn, $_POST['p_base-price']);
    $p_optional_features = mysqli_real_escape_string($conn, $_POST['p_optional_features']);
    
    // File upload variables
    $file_name = $_FILES['images']['name'];
    $tempname = $_FILES['images']['tmp_name'];
    $folder = 'products_tb/' . $file_name;
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($tempname, $folder)) {
        // Insert file path and form data into the database
        $sql = "INSERT INTO `products_tb` (`id`, `images`, `p_brand`, `p_model`, `p_year`, `p_type`, `p_frame_size`, `p_wheel_size`, 
                    `p_weight`, `p_motor_type`, `p_motor_power`, `p_top_speed`, `p_pedal_assist_levels`, 
                    `p_throttle`, `p_battery_type`, `p_battery_capacity`, `p_range`, `p_charge_time`, 
                    `p_gears`, `p_brakes`, `p_suspension`, `p_tires`, `p_frame_material`, `p_fork`, 
                    `p_handlebars`, `p_display`, `p_lighting`, `p_connectivity`, `p_fenders`, `p_rack`, 
                    `p_kickstand`, `p_lock`, `p_accessories`, `p_warranty`, `p_torque`, 
                    `p_max_rider_weight`, `p_water_resistance`, `p_base_price`, `p_optional_features`) 
                
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
            header("Location: Admin/Dashboard.php?msg=Success!");
            exit(); // Ensure that no further code is executed after redirect
        } else {
            die("Failed to insert into the database: " . mysqli_error($conn));
        }
    } else {
        echo "Failed to upload the image.";
    }
}

// Query to select all records from the products_tb table
$sql_select = "SELECT * FROM products_tb";
$result = mysqli_query($conn, $sql_select);

// Check for query errors
if (!$result) {
    die("Error retrieving records: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>E-Shop</title>
        <link rel="stylesheet" type="text/css" href="../styles/shop_style.css"/>
    </head>
    <body>
        <!-- content -->
        <div class="shop-name-logo">
            <h2>Shop Name and Logo</h2>
        </div>
        <div class="Name-tag"> Guest </div>
        <button class="menu-button" onclick="openNav()">☰ Menu</button>
        
        <div id="right-side-panel" class="side-panel">
            <a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
            <a href="#">Browse</a>
            <a href="#">Parts and Services</a>
            <a href="#">Find us</a>
            <a href="#">Profile</a>
            <a href="#">Feedback</a>
            <a href="Settings.php">Settings</a>
            <a href="Dashboard.php">Back</a>
        </div>

        <div class="container">
            <div class="left-nav">
                <h2>Home</h2>
                <h2>Deals</h2>
                <h2>New</h2>
                <h2>All Products</h2>
            </div>
            <div class="Product-Showcase">
                <div class="Product-Carousel">
                    <div class="slides">
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class="slide">
                                <img src="../<?php echo htmlspecialchars($row['images']); ?>" alt="Product Image">
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                    <button class="next" onclick="moveSlide(1)">&#10095;</button>
                </div>
                
                <!-- Display details for the first product as an example -->
                <?php 
                mysqli_data_seek($result, 0); // Reset result pointer to the first record
                if ($first_product = mysqli_fetch_assoc($result)): ?>
                    <div class="Product-Description">
                        <h2>Item Details</h2>
                        <div class="basic-info">
                            <p><strong>Brand and Model:</strong> <?php echo htmlspecialchars($first_product['p_brand']) . ' ' . htmlspecialchars($first_product['p_model']); ?></p>
                            <p><strong>Year:</strong> <?php echo htmlspecialchars($first_product['p_year']); ?></p>
                            <p><strong>Type:</strong> <?php echo htmlspecialchars($first_product['p_type']); ?></p>
                            <button class="Details-Button" id="details-button">More Details</button>
                        </div>
                    </div>

                    <div class="popup" id="details-popup">
                        <div class="popup-content">
                            <span class="close" id="close-popup">&times;</span>
                            <h3 class="popup-title">More Details</h3>
                            
                            <div class="details-section">
                                <h4>Dimensions and Weight</h4>
                                <p><strong>Frame Size:</strong> <?php echo htmlspecialchars($first_product['p_frame_size']); ?></p>
                                <p><strong>Wheel Size:</strong> <?php echo htmlspecialchars($first_product['p_wheel_size']); ?></p>
                                <p><strong>Weight:</strong> <?php echo htmlspecialchars($first_product['p_weight']); ?></p>
                            </div>
                        
                            <div class="details-section">
                                <h4>Motor and Performance</h4>
                                <p><strong>Motor Type:</strong> <?php echo htmlspecialchars($first_product['p_motor_type']); ?></p>
                                <p><strong>Motor Power:</strong> <?php echo htmlspecialchars($first_product['p_motor_power']); ?></p>
                                <p><strong>Top Speed:</strong> <?php echo htmlspecialchars($first_product['p_top_speed']); ?></p>
                                <p><strong>Pedal Assist Levels:</strong> <?php echo htmlspecialchars($first_product['p_pedal_assist_levels']); ?></p>
                                <p><strong>Throttle:</strong> <?php echo htmlspecialchars($first_product['p_throttle']); ?></p>
                            </div>
                        
                            <div class="details-section">
                                <h4>Battery</h4>
                                <p><strong>Battery Type:</strong> <?php echo htmlspecialchars($first_product['p_battery_type']); ?></p>
                                <p><strong>Battery Capacity:</strong> <?php echo htmlspecialchars($first_product['p_battery_capacity']); ?></p>
                                <p><strong>Range:</strong> <?php echo htmlspecialchars($first_product['p_range']); ?></p>
                                <p><strong>Charge Time:</strong> <?php echo htmlspecialchars($first_product['p_charge_time']); ?></p>
                            </div>
                        
                            <div class="details-section">
                                <h4>Drivetrain and Components</h4>
                                <p><strong>Gears:</strong> <?php echo htmlspecialchars($first_product['p_gears']); ?></p>
                                <p><strong>Brakes:</strong> <?php echo htmlspecialchars($first_product['p_brakes']); ?></p>
                                <p><strong>Suspension:</strong> <?php echo htmlspecialchars($first_product['p_suspension']); ?></p>
                                <p><strong>Tires:</strong> <?php echo htmlspecialchars($first_product['p_tires']); ?></p>
                            </div>
                        
                            <div class="details-section">
                                <h4>Frame and Construction</h4>
                                <p><strong>Frame Material:</strong> <?php echo htmlspecialchars($first_product['p_frame_material']); ?></p>
                                <p><strong>Fork:</strong> <?php echo htmlspecialchars($first_product['p_fork']); ?></p>
                                <p><strong>Handlebars:</strong> <?php echo htmlspecialchars($first_product['p_handlebars']); ?></p>
                            </div>
                        
                            <div class="details-section">
                                <h4>Electronics and Controls</h4>
                                <p><strong>Display:</strong> <?php echo htmlspecialchars($first_product['p_display']); ?></p>
                                <p><strong>Lighting:</strong> <?php echo htmlspecialchars($first_product['p_lighting']); ?></p>
                                <p><strong>Connectivity:</strong> <?php echo htmlspecialchars($first_product['p_connectivity']); ?></p>
                            </div>
                        
                            <div class="details-section">
                                <h4>Safety and Convenience Features</h4>
                                <p><strong>Fenders:</strong> <?php echo htmlspecialchars($first_product['p_fenders']); ?></p>
                                <p><strong>Rack:</strong> <?php echo htmlspecialchars($first_product['p_rack']); ?></p>
                                <p><strong>Kickstand:</strong> <?php echo htmlspecialchars($first_product['p_kickstand']); ?></p>
                                <p><strong>Lock:</strong> <?php echo htmlspecialchars($first_product['p_lock']); ?></p>
                            </div>
                        
                            <div class="details-section">
                                <h4>Accessories and Additional Features</h4>
                                <p><strong>Accessories:</strong> <?php echo htmlspecialchars($first_product['p_accessories']); ?></p>
                                <p><strong>Warranty:</strong> <?php echo htmlspecialchars($first_product['p_warranty']); ?></p>
                            </div>
                        
                            <div class="details-section">
                                <h4>Technical Specifications</h4>
                                <p><strong>Torque:</strong> <?php echo htmlspecialchars($first_product['p_torque']); ?></p>
                                <p><strong>Max Rider Weight:</strong> <?php echo htmlspecialchars($first_product['p_max_rider_weight']); ?></p>
                                <p><strong>Water Resistance:</strong> <?php echo htmlspecialchars($first_product['p_water_resistance']); ?></p>
                            </div>
                        
                            <div class="details-section">
                                <h4>Price</h4>
                                <p><strong>Base Price:</strong> <?php echo htmlspecialchars($first_product['p_base_price']); ?></p>
                                <p><strong>Optional Features:</strong> <?php echo htmlspecialchars($first_product['p_optional_features']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <script src="../js/shop_script.js"></script>
    </body>
</html>