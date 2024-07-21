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
        }
        .container {
            display: flex;
            flex-wrap: wrap;
        }
        /* top nav */
        .shop-name-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40%;
            height: 13.6vh;
            margin-left: -4rem ;
            background-color: #555;
            clip-path: polygon(0 0, 100% 0, 75% 100%, 0 100%);
        }
        .shop-name-logo h1 {
            color: white;
            margin: 0;
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
        }
        .side-panel {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
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
            height: 100vh;
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
            background-color: #dedfad;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-weight: bold;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }
        .Product-Carousel img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 50px;
        }
        .prev, .next {
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
            .prev, .next {
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
            .prev, .next {
                padding: 0.3rem;
            }
        }
        .Product-Description {
            flex: 1;
            padding: 1rem;
            border: 5px solid #262700;
            border-radius: 5px;
            background-color: #c3ff69;
            overflow: hidden;
        }
        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
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
    <div class="shop-name-logo">
        <h1>Shop Name and Logo</h1>
    </div>
    
    <button class="menu-button" onclick="openNav()">☰ Menu</button>
    
    <div id="right-side-panel" class="side-panel">
        <a href="javascript:void(0)" class="close-btn" onclick="closeNav()">&times;</a>
        <a href="#">Browse</a>
        <a href="#">Parts and Services</a>
        <a href="#">Find us</a>
        <a href="#">Profile</a>
        <a href="#">Feedback</a>
        <a href="#">Settings</a>
        <a href="#" id="login-button">Log In</a>
    </div>

    <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content login-form">
        <span class="close">&times;</span>
        <h2>Login Form</h2>
        <form action="Login.php" method="post">
            <div>
                <label for="i_email">Email:</label>
                <input type="text" name="i_email" id="i_email" placeholder="Email" required>
            </div>
            <div>
                <label for="i_password">Password:</label>
                <input type="password" name="i_password" id="i_password" placeholder="Password" required>
            </div>
            <button type="submit" name="Login">Login</button>
            <a href="Register.php?" class="register-link">Register</a>
        </form>
      </div>

    </div>

    <div class="container">
        <div class="left-nav">
            <h2>Home</h2>
            <h2>Deals</h2>
            <h2>New</h2>
            <h2>All Products</h2>
        </div>
        <div class="filler"><img src="Images/teto.png"></div>
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
                <button> Details </button>
            </div>
        </div>
    </div>
    <div class="Deals">
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

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
