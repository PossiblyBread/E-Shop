<?php
session_start();
include "../db_conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);
    $h_password = mysqli_real_escape_string($conn, $_POST['h_password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $sql_insert = "INSERT INTO `accounts` (`id`, `last_name`, `first_name`, `email`, `phone_num`, `h_password`, `role`) 
                    VALUES (NULL, '$last_name', '$first_name', '$email', '$phone_num', '$h_password', '$role')";
    if (!mysqli_query($conn, $sql_insert)) {
        die("Error inserting record: " . mysqli_error($conn));
    }
}

$sql_select = "SELECT * FROM accounts";
$result = mysqli_query($conn, $sql_select);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Accounts Data</title>
    <link rel="stylesheet" type="text/css" href="../styles/dashboard_style.css"/>
</head>
    <body>
        <nav class="right-navbar">
            <ul>
                <li><a href="Dashboard.php">Dashboard</a></li>
                <li><a href="admin_view.php" data-modal="home-modal">Home</a></li>
                <li><a href="Ledger.php">Ledger</a></li>
                <li><a href="upload_product.php">Add new Product</a></li>
                <li><a href="order_entry.php">Create new Order</a></li>
                <li><a href="#" data-modal="user-account-modal">User Account Data</a></li>
                <li><a href="" data-modal="tickets-modal" data-url="itsupport.php">Tickets</a></li>
                <li><a href="" data-modal="logout-modal">Log Out</a></li>
            </ul>
        </nav>
        <div id="home-modal" class="modal">
            <div class="logout-modal-content">
                <span class="close-btn">&times;</span>
                <h2>View Home Page?</h2>
                <p>Leaving dashboard...</p>
                <form id="logout-form" action="admin_view.php" method="post">
                    <div class="modal-buttons">
                        <button type="submit" id="confirm-logout">Confirm</button>
                        <button type="button" class="cancel-btn" id="cancel-logout">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="user-account-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <h2>User Account Data</h2>
                <table class=accounts>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <td>Date Created</td> 
                    </tr>
                    
                    <?php
                        $sql = "SELECT * FROM `accounts`";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["last_name"] ?></td>
                        <td><?php echo $row["first_name"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["phone_num"] ?></td>
                        <td><?php echo $row["role"] ?></td>
                        <td><?php echo $row["date_time"] ?></td>
                    </tr>

                    <?php
                        }
                    ?>

                </table>
            </div>
        </div>

        <div id="tickets-modal" class="modal">
            <div class="modal-content">
                <span class="close-btn">&times;</span>
                <div id="tickets-content">
                    <!-- Content from ticketing.php will be loaded here -->
                </div>
            </div>
        </div>


        <div id="logout-modal" class="modal">
            <div class="logout-modal-content">
                <span class="close-btn">&times;</span>
                <h2>Log Out</h2>
                <p>Are you sure you want to log out?</p>
                <form id="logout-form" action="../logout.php" method="post">
                    <div class="modal-buttons">
                        <button type="submit" id="confirm-logout">Confirm</button>
                        <button type="button" class="cancel-btn" id="cancel-logout">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <a href="Register.php" class="adduser-button">Add New Users +</a>
        <script src="../js/dashboard_script.js"></script>
    </body>
</html>

<?php
    mysqli_close($conn);
?>