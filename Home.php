<!DOCTYPE html>
<html>
<body>
    <h1>
        (Free to browse area with limited access)
    </h1>

    <div>
        <h2> Login Form </h2>


        <form action="Login.php" method="post">
            <div>
                <label class="registration-label">Email:</label>
                <input type="text" class="form-control" name="i_email" id="i_email" placeholder="Email" required>            
            </div>
            <div>
                <label class="registration-label">Password:</label>
                <input type="text" class="form-control" name="i_password" id="i_password" placeholder="Password" required>            
            </div>  
            <button type="Login" class="Button-Login" name="Login">Login</button>
            <!-- sends you to register a new account -->
            <a href="Register.php?" class="register-button">Register</a>
        </form>
    </div>
</body>
</html>
