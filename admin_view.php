<?php
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Shop</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            position: relative;
            background: linear-gradient(135deg, #ffe4bf 0%, #f0af73 100%);
            color: rgb(0, 0, 0);
        }

        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://www.transparenttextures.com/patterns/asfalt-light.png');
            opacity: 0.1;
            z-index: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            position: relative;
            z-index: 2;
            min-height: 100vh;
        }

        /* top nav */
        .shop-name-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30%;
            height: 13.6vh;
            margin-left: -4rem;
            background-color: #555;
            clip-path: polygon(95% 0%, 100% 25%, 85% 100%, 0% 100%, 0% 0%);
        }

        .shop-name-logo h2 {
            color: rgb(255, 255, 255);
            margin: 0;
        }

        .Name-tag {
            top: 20px;
            right: 170px;
            padding: 0.5rem;
            position: absolute;
            font-family: 'Arial Black', sans-serif;
            font-size: 30px;
            color: #fff;
            background: linear-gradient(135deg, #5769ed 0%, #000dff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        /* right side panel */
        .menu-button {
            padding: 0.5rem;
            background-color: #5552ac;
            color: white;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            position: absolute;
            top: 20px;
            right: 20px;
            border-radius: 10px;
        }

        .side-panel {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 3;
            top: 0;
            right: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .side-panel a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .side-panel a:hover {
            color: #f1f1f1;
        }

        .side-panel .close-btn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        /* left nav */
        .left-nav {
            padding: 1rem;
            background-color: #d7dd21;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            text-align: center;
            flex: 1;
            overflow-y: auto;
            height: 100%;
        }

        .left-nav h2 {
            margin: 0;
            padding: 1rem;
            background-color: #e3e67d;
        }

        .filler {
            position: fixed;
            bottom: 0;
            left: 0;
            margin-left: 4rem;
        }

        .filler img {
            width: 25vh;
            height: auto;
        }

        /* content area */
        .Product-Showcase {
            display: flex;
            padding: 1rem;
            border: 5px solid #262700;
            border-radius: 5px;
            background-color: #454040;
            overflow: hidden;
            flex-direction: row;
            gap: 1rem;
            flex: 4;
        }

        .Product-Carousel {
            flex: 2;
            border: 5px solid #372ee2;
            padding: 1rem;
            border-radius: 5px;
            background-color: #e74545;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .slides {
            display: flex;
            transition: transform 0.5s ease-in-out;
            width: 100%;
        }

        .slide {
            min-width: 100%;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .Product-Carousel img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 50px;
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 1rem;
            cursor: pointer;
        }

        .prev {
            left: 1rem;
        }

        .next {
            right: 1rem;
        }

        @media (max-width: 300px) {
            .shop-name-logo {
                height: 10vh;
            }

            .header-nav h2 {
                padding: 0.3rem;
            }

            .left-nav {
                padding: 0.5rem;
                gap: 0.5rem;
            }

            .left-nav h2 {
                padding: 0.5rem;
            }

            .Product-Showcase {
                padding: 0.5rem;
            }

            .Product-Carousel {
                padding: 0.5rem;
            }

            .prev,
            .next {
                padding: 0.5rem;
            }
        }

        @media (max-width: 300px) {
            .header-nav {
                flex-direction: column;
                align-items: center;
            }

            .slides {
                gap: 0.5rem;
            }

            .prev,
            .next {
                padding: 0.3rem;
            }
        }

        /* description */
        .Product-Description {
            height: 40%;
            flex: 1;
            padding: 1rem;
            border: 5px solid #262700;
            border-radius: 5px;
            background-color: #c3ff69;
            overflow: hidden;
            transition: background-color 0.3s, transform 0.3s;
        }

        .Details-Button {
            align-items: center;
            padding: 0.8rem;
            background-color: #5552ac;
            color: white;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            position: absolute;
            border-radius: 10px;
        }

        .product-description h2 {
            margin: 0 0 1rem;
        }

        .basic-info {
            margin-bottom: 1rem;
        }

        .product-description button {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border: none;
            border-radius: 3px;
            background-color: #262700;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product-description button:hover {
            background-color: #404040;
        }

        .product-description:hover {
            background-color: #a3ff8d;
            transform: scale(1.02);
        }

        /* Popup Styles */
        .popup {
            display: none;
            position: fixed;
            right: 0;
            top: 0;
            width: 50%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
            transform: translateY(-100%);
        }

        .popup-content {
            background-color: #ffffff;
            color: #262700;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            position: relative;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 24px;
            color: #262700;
            cursor: pointer;
        }

        /* Details Section Styles */
        .details-section {
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #dcdcdc;
            padding-bottom: 1rem;
        }

        .details-section h4 {
            margin-bottom: 0.5rem;
            color: #4caf50;
            /* green for headers */
        }

        .details-section strong {
            color: #333;
            /* Darker color for the strong text */
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 4;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            /* Could be more or less, depending on screen size */
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* The Close Button */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Login Form */
        .login-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .login-form label {
            display: block;
            margin-bottom: 5px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #5552ac;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .login-form button[type="submit"]:hover {
            background-color: #444199;
        }

        .register-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #5552ac;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
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

    <script>
        let slideIndex = 0;
        let intervalId;

        const slides = document.querySelectorAll('.slide');
        const slidesContainer = document.querySelector('.slides');
        const intervalTime = 3000; // 3 seconds

        function showSlide(n) {
            if (n >= slides.length) {
                slideIndex = 0;
            } else if (n < 0) {
                slideIndex = slides.length - 1;
            } else {
                slideIndex = n;
            }
            const offset = -slideIndex * 100;
            slidesContainer.style.transform = `translateX(${offset}%)`;
        }

        function moveSlide(n) {
            clearInterval(intervalId);
            showSlide(slideIndex + n);
            intervalId = setInterval(autoSlide, intervalTime);
        }

        function autoSlide() {
            slideIndex++;
            if (slideIndex >= slides.length) {
                slideIndex = 0;
            }
            showSlide(slideIndex);
        }

        intervalId = setInterval(autoSlide, intervalTime);
        showSlide(slideIndex);

        function openNav() {
            document.getElementById("right-side-panel").style.width = "300px";
        }

        function closeNav() {
            document.getElementById("right-side-panel").style.width = "0";
        }
        document.getElementById('details-button').addEventListener('click', function() {
            var popup = document.getElementById('details-popup');
            popup.style.display = 'block';
            setTimeout(() => {
                popup.style.transform = 'translateY(0)';
            }, 10); // slight delay for the slide effect
        });

        document.getElementById('close-popup').addEventListener('click', function() {
            var popup = document.getElementById('details-popup');
            popup.style.transform = 'translateY(-100%)';
            setTimeout(() => {
                popup.style.display = 'none';
            }, 300); // match the transition duration
        });
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("login-button");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>