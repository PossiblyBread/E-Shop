<?php
session_start();
include "db_conn.php";
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
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .adduser-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .right-navbar {
            position: fixed;
            top: 0;
            right: 0;
            height: 100%;
            width: 250px;
            background-color: #333;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.3);
        }

        .right-navbar ul {
            list-style-type: none;
            padding: 0;
            margin-top: 50px;
            width: 100%;
        }

        .right-navbar a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 15px;
            transition: background-color 0.3s ease;
        }

        .right-navbar a:hover {
            background-color: #555;
        }

        /* Modal styling */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            z-index: 1000;
            /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.6);
            /* Black with opacity */

        }

        /* Modal content styling */
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 5px;
            width: 100%;
            /* Adjust width as needed */
            max-width: 50rem;
            /* Optional, to limit the max width */

        }

        /* for logout button */
        .logout-modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 5px;
            width: 20%;
            /* Adjust width as needed */
            max-width: 50rem;
            /* Optional, to limit the max width */

        }

        /* Close button styling */
        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .accounts {
            width: 100%;
            max-width: 1150px;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <nav class="right-navbar">
        <ul>
            <li><a href="admin_view.php" data-modal="Home">Home</a></li>
            <li><a href="#" data-modal="user-account-modal">User Account Data</a></li>
            <li><a href="" data-modal="tickets-modal" data-url="itsupport.php">Tickets</a></li>
            <li><a href="#" data-modal="logout-modal">Log Out</a></li>
        </ul>
    </nav>

    <div id="Home" class="modal">
        <div class="logout-modal-content">
            <span class="close-btn">&times;</span>
            <p>View Home page?</p>
            <form id="Home" action="admin_view.php" method="post">
                <div class="modal-buttons">
                    <button type="submit" id="admin_view.php">Confirm</button>
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
            <form id="logout-form" action="logout.php" method="post">
                <div class="modal-buttons">
                    <button type="submit" id="confirm-logout">Confirm</button>
                    <button type="button" class="cancel-btn" id="cancel-logout">Cancel</button>
                </div>
            </form>
        </div>
    </div>


    <a href="Register.php" class="adduser-button">Add New Users +</a>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modals = document.querySelectorAll('.modal');
            const links = document.querySelectorAll('.right-navbar a');
            const closeButtons = document.querySelectorAll('.close-btn');

            // Function to open a modal and load content
            function openModal(modalId, contentUrl) {
                const modal = document.getElementById(modalId);
                const modalContent = modal.querySelector('#tickets-content');

                if (contentUrl) {
                    fetch(contentUrl)
                        .then(response => response.text())
                        .then(data => {
                            modalContent.innerHTML = data; // Load content into the modal
                            modal.style.display = 'block'; // Show the modal
                        })
                        .catch(error => {
                            console.error('Error loading content:', error);
                        });
                } else {
                    modal.style.display = 'block'; // Show the modal
                }
            }

            // Function to close all modals
            function closeAllModals() {
                modals.forEach(modal => {
                    modal.style.display = 'none';
                });
            }

            // Add click event to each link
            links.forEach(link => {
                link.addEventListener('click', (event) => {
                    event.preventDefault();
                    const modalId = link.getAttribute('data-modal');
                    const contentUrl = link.getAttribute('data-url');
                    openModal(modalId, contentUrl);
                });
            });

            // Add click event to each close button
            closeButtons.forEach(button => {
                button.addEventListener('click', () => {
                    closeAllModals();
                });
            });

            // Add click event to the window to close modal if clicked outside
            window.addEventListener('click', (event) => {
                if (event.target.classList.contains('modal')) {
                    closeAllModals();
                }
            });

            // Handle logout confirmation
            document.getElementById('confirm-logout').addEventListener('click', () => {
                document.getElementById('logout-form').submit();
            });

            document.getElementById('cancel-logout').addEventListener('click', () => {
                closeAllModals();
            });
        });
    </script>
</body>

</html>

<?php
mysqli_close($conn);

?>