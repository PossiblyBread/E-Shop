<?php
include "../db_conn.php";
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
        <a href="Profile.php">Profile</a>
        <a href="#">Feedback</a>
        <a href="Settings.php">Settings</a>
        <a href="Admin.php" id="login-button">Back</a>
    </div>

    <div class="container">
        <div class="left-nav">
            <h2>Home</h2>
            <h2>Deals</h2>
            <h2>New</h2>
            <h2>All Products</h2>
        </div>
        <div class="filler"><img src="Images/cat1.jpg"></div>
        <div class="Product-Showcase">
            <div class="Product-Carousel">
                <div class="slides">
                    <div class="slide"><img src="Images/cat-in-box.png"></div>
                    <div class="slide"><img src="Images/cat-in-box-dead.png"></div>
                    <div class="slide"><img src="Images/cat-in-box.png"></div>
                    <div class="slide"><img src="Images/cat-in-box-dead.png"></div>
                    <div class="slide"><img src="Images/cat-in-box.png"></div>
                </div>
                <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
                <button class="next" onclick="moveSlide(1)">&#10095;</button>
            </div>
            <div class="Product-Description">
                <h2>Item Details</h2>
                <div class="basic-info">
                    <p><strong>Brand and Model:</strong> Manufacturer and model name.</p>
                    <p><strong>Year:</strong> Year of manufacture.</p>
                    <p><strong>Type:</strong> Mountain bike, road bike, city/commuter bike, folding bike, etc.</p>
                    <button class="Details-Button" id="details-button">More Details</button>
                </div>
            </div>

            <div class="popup" id="details-popup">
                <div class="popup-content">
                    <span class="close" id="close-popup">&times;</span>
                    <h3 class="popup-title">More Details</h3>

                    <div class="details-section">
                        <h4>Dimensions and Weight</h4>
                        <p><strong>Frame Size:</strong> Suitable rider height or frame measurements (e.g., small, medium, large).</p>
                        <p><strong>Wheel Size:</strong> Diameter of the wheels (e.g., 26", 27.5", 29").</p>
                        <p><strong>Weight:</strong> Total weight of the e-bike including battery.</p>
                    </div>

                    <div class="details-section">
                        <h4>Motor and Performance</h4>
                        <p><strong>Motor Type:</strong> Hub motor, mid-drive motor.</p>
                        <p><strong>Motor Power:</strong> Rated power in watts (e.g., 250W, 500W, 750W).</p>
                        <p><strong>Top Speed:</strong> Maximum assisted speed (e.g., 20 mph, 28 mph).</p>
                        <p><strong>Pedal Assist Levels:</strong> Number of assistance levels (e.g., 3, 5).</p>
                        <p><strong>Throttle:</strong> Whether it has a throttle and its type (e.g., thumb, twist).</p>
                    </div>

                    <div class="details-section">
                        <h4>Battery</h4>
                        <p><strong>Battery Type:</strong> Lithium-ion, etc.</p>
                        <p><strong>Battery Capacity:</strong> Measured in watt-hours (Wh) or ampere-hours (Ah).</p>
                        <p><strong>Range:</strong> Estimated range per charge (e.g., 30-50 miles).</p>
                        <p><strong>Charge Time:</strong> Time required to fully charge the battery.</p>
                    </div>

                    <div class="details-section">
                        <h4>Drivetrain and Components</h4>
                        <p><strong>Gears:</strong> Number and type of gears (e.g., Shimano 7-speed).</p>
                        <p><strong>Brakes:</strong> Type of brakes (e.g., mechanical disc, hydraulic disc).</p>
                        <p><strong>Suspension:</strong> Front suspension, full suspension, or rigid.</p>
                        <p><strong>Tires:</strong> Type and size of tires (e.g., 27.5"x2.4" mountain tires).</p>
                    </div>

                    <div class="details-section">
                        <h4>Frame and Construction</h4>
                        <p><strong>Frame Material:</strong> Aluminum, carbon fiber, steel, etc.</p>
                        <p><strong>Fork:</strong> Type and material of the fork (e.g., aluminum suspension fork).</p>
                        <p><strong>Handlebars:</strong> Type (e.g., flat, drop, riser) and material.</p>
                    </div>

                    <div class="details-section">
                        <h4>Electronics and Controls</h4>
                        <p><strong>Display:</strong> Type and features of the display (e.g., LCD, LED).</p>
                        <p><strong>Lighting:</strong> Integrated front and rear lights, reflectors.</p>
                        <p><strong>Connectivity:</strong> Bluetooth, app compatibility for tracking and adjustments.</p>
                    </div>

                    <div class="details-section">
                        <h4>Safety and Convenience Features</h4>
                        <p><strong>Fenders:</strong> Front and rear fenders for protection.</p>
                        <p><strong>Rack:</strong> Rear rack for carrying cargo.</p>
                        <p><strong>Kickstand:</strong> Type and placement.</p>
                        <p><strong>Lock:</strong> Built-in lock or lock compatibility.</p>
                    </div>

                    <div class="details-section">
                        <h4>Accessories and Additional Features</h4>
                        <p><strong>Accessories:</strong> Bells, mirrors, bottle holders, etc.</p>
                        <p><strong>Warranty:</strong> Information on the e-bike’s warranty.</p>
                    </div>

                    <div class="details-section">
                        <h4>Technical Specifications</h4>
                        <p><strong>Torque:</strong> Motor torque in Newton-meters (Nm).</p>
                        <p><strong>Max Rider Weight:</strong> Maximum load capacity.</p>
                        <p><strong>Water Resistance:</strong> IP rating for water and dust resistance.</p>
                    </div>

                    <div class="details-section">
                        <h4>Price</h4>
                        <p><strong>Base Price:</strong> Starting price of the e-bike.</p>
                        <p><strong>Optional Features:</strong> Prices for add-ons and accessories.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/shop_script.js"></script>
</body>

</html>