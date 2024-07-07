<?php
    include "db_conn.php";
?>

<!DOCTYPE html>
<html>
    <body>
        <div class="registration-form">
            <h3> Registration Form</h3>
            <form action="" method="post">
                <div>
                    <label class="registration-label">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>            
                </div>
                <div>
                    <label class="registration-label">First Name:</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>            
                </div>
                <div>
                    <label class="registration-label">Email:</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>            
                </div>  
                <div>
                    <label class="registration-label">Phone Number:</label>
                    <input type="text" class="form-control" name="phone_num" id="phone_num" placeholder="Phone Number" required>            
                </div>
                <div>
                    <label class="registration-label">Password:</label>
                    <input type="text" class="form-control" name="a_password" id="a_password" placeholder="Password" required>            
                </div>
                
                
                <div>
                    <!-- sends you to shop -->
                    <button type="Submit" class="btn btn-success" name="Submit">Register</button> 
                    <!-- sends you to home -->
                    <a href="Home.php?" class="cancel-button">Cancel</a>
                </div>
            </form>
        </div>

    </body>
</html>