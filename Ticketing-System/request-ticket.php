<?php
include "../db_conn.php";
session_start();
?>
<!DOCTYPE html>                                                                                                                                                                                                                                                                                                                    
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ticket Request</title>
        <link rel="stylesheet" type="text/css" href="../styles/request-ticket_style.css"/>
    </head>
    <body>
        <!-- make the data go inside the database -->
        <div class="ticket-form">
            <h2>Submit a Ticket</h2>
            <!-- <form action="https://api.web3forms.com/submit" method="post"> -->
            <form action="" method="post">
                <!-- <input type="hidden" name="access_key" value="2bde6572-687f-47ce-aa2d-a6c4671ef752"> -->

                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>

                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" required>

                <label for="phone_num">Phone Number</label>
                <input type="text" id="phone_num" name="phone_num" required>

                <label for="type">Ticket Type</label>
                <select id="type" name="type" required>
                    <option value="Technical">Technical</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Billing">Billing</option>
                    <option value="Assist_Req">Assistance Request</option>
                </select>

                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" required></textarea>

                <button class="submit-button" type="submit" name="submit-ticket">Submit Ticket</button>
                <button class="cancel-button" type="button" onclick="window.history.back();">Cancel</button>
            </form>
        </div>
    </body>
    <!-- <script>
        const form = document.getElementById('form');
        const result = document.getElementById('result');
        
        form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);
        const object = Object.fromEntries(formData);
        const json = JSON.stringify(object);
        result.innerHTML = "Please wait..."
        
            fetch('https://api.web3forms.com/submit', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: json
                })
                .then(async (response) => {
                    let json = await response.json();
                    if (response.status == 200) {
                        result.innerHTML = "Form submitted successfully";
                    } else {
                        console.log(response);
                        result.innerHTML = json.message;
                    }
                })
                .catch(error => {
                    console.log(error);
                    result.innerHTML = "Something went wrong!";
                })
                .then(function() {
                    form.reset();
                    setTimeout(() => {
                        result.style.display = "none";
                    }, 3000);
                });
        });
        
        export default function Contact() {
        const [result, setResult] = React.useState("");
    
        const onSubmit = async (event) => {
        event.preventDefault();
        setResult("Sending....");
        const formData = new FormData(event.target);
    
        formData.append("access_key", "2bde6572-687f-47ce-aa2d-a6c4671ef752E");
    
        const response = await fetch("https://api.web3forms.com/submit", {
            method: "POST",
            body: formData
        });
    
        const data = await response.json();
    
        if (data.success) {
            setResult("Form Submitted Successfully");
            event.target.reset();
        } else {
            console.log("Error", data);
            setResult(data.message);
        }
        };
    
        return (
        <div>
            <form onSubmit={onSubmit}>
                <input type="text" id="first_name" name="first_name" required/>
                <input type="text" id="last_name" name="last_namem" required/>
                <input type="text" id="phone_num" name="phone_num" required/>
                <select id="type" name="type" required></select>
                <textarea id="description" name="description" rows="4" required></textarea>
            </form>
            <span>{result}</span>
        </div>
        );
    }
    </script> -->
</html>