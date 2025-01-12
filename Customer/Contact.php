<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Online Cloth Shopping</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <style>
        #contact-info {
            margin-top: 20px;
            padding: 20px;
            background-color: #f8f9fa; /* Light background for contrast */
            border-radius: 5px; /* Rounded corners */
            display: flex;
            flex-direction: column; /* Stack items vertically */
        }
        .location {
            display: flex; /* Use flexbox for location sections */
            justify-content: space-between; /* Space out the content */
            margin-bottom: 30px; /* Space between locations */
            padding: 10px; /* Padding around each location */
            border: 1px solid #ddd; /* Light border */
            border-radius: 5px; /* Rounded corners */
            background-color: #ffffff; /* White background for contrast */
        }
        .contact-item {
            margin-bottom: 5px; /* Reduced margin for items */
        }
        .social-icons {
            margin-top: 20px; /* Space above social icons */
        }
        .social-icons a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff; /* Bootstrap primary color */
        }
    </style>
</head>
<body>
<div id="wrapper">
    <?php include "Header.php"; ?>
    <div id="content">
        <h1>Contact Us</h1>
        
        <div id="contact-info">
            <div class="location">
                <div>
                    <h2>Addis Ababa</h2>
                    <div class="contact-item">
                        <strong>Address:</strong> Addis Ababa, Ethiopia
                    </div>
                    <div class="contact-item">
                        <strong>Phone:</strong> +251 123 456 789
                    </div>
                    <div class="contact-item">
                        <strong>Email:</strong> <a href="mailto:addis@sundaymarket.com">addis@sundaymarket.com</a>
                    </div>
                </div>
                <div>
                    <img src="addis-image.jpg" alt="Addis Ababa" style="width: 100px; height: auto;"> <!-- Placeholder for image -->
                </div>
            </div>

            <div class="location">
                <div>
                    <h2>Dessie</h2>
                    <div class="contact-item">
                        <strong>Address:</strong> Dessie, Ethiopia
                    </div>
                    <div class="contact-item">
                        <strong>Phone:</strong> +251 987 654 321
                    </div>
                    <div class="contact-item">
                        <strong>Email:</strong> <a href="mailto:dessie@sundaymarket.com">dessie@sundaymarket.com</a>
                    </div>
                </div>
                <div>
                    <img src="dessie-image.jpg" alt="Dessie" style="width: 100px; height: auto;"> <!-- Placeholder for image -->
                </div>
            </div>

            <div class="social-icons">
                <strong>Follow us on:</strong>
                <a href="https://instagram.com" target="_blank">Instagram</a>
                <a href="https://telegram.org" target="_blank">Telegram</a>
                <a href="https://facebook.com" target="_blank">Facebook</a>
            </div>
        </div>
    </div>
</div>

<?php include "Footer.php"; ?>
</body>
</html>