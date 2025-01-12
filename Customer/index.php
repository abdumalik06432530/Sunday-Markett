<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sunday Market</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style>
       body {
    background-image: url('backgroun.jpg'); /* Add your background image URL here */
    background-size: cover; /* Ensure the image covers the entire area */
    background-position: center; /* Center the image */
    background-attachment: fixed; /* Optional: Makes the background stay fixed while scrolling */
    margin: 0;
    padding: 0;
}

.welcomemessage h2 {
    color:black;
    font-size: 40px;
    margin-bottom: 20px; /* Space between h2 and h3 */
    text-shadow: none; /* Removed text shadow */
}

.welcomemessage h3 {
    color:black;
    font-size: 26px;
    font-style: italic;
    margin-top: 10px; /* Add space between h2 and h3 */
    font-weight: 300;
    text-shadow: none; /* Removed text shadow */
}

#wrapper {
    padding-top: 100px;
}


    </style>
</head>
<body>
    <div>
    <?php include "Header.php"; ?>
    </div><br><br>
    <div id="wrapper" class="container mt-3">
        <div class="welcomemessage text-center mb-4">
            <h2>Welcome to, <?php echo htmlspecialchars($_SESSION['Name']); ?></h2>
            <h3>Your journey to the best deals at Sunday Market starts here!</h3>
        </div>
        <div style="clear:both;"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
