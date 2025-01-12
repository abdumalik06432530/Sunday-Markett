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
    <title>Sunday  Market</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style>
      form {
    width: 80%; /* Adjust width for better layout */
    max-width: 600px; /* Ensure it doesn't stretch too wide */
    margin: 0 auto; /* Center the form */
    padding: 20px; /* Add padding for internal spacing */
    background-color: #f9f9f9; /* Light background for contrast */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    display: flex;
    flex-direction: column;
    align-items: center;
}

.form-group {
    font-size: 20px;
    margin-bottom: 20px;
    width: 100%;
    display: flex;
    flex-direction: column; /* Align labels and inputs vertically */
    justify-content: flex-start; /* Align text to the left */
}

.form-group label {
    margin-bottom: 5px; /* Space between label and input */
    font-weight: bold; /* Highlight labels */
    color: #333; /* Text color */
}

.form-group textarea {
    width: 100%;
    height: 150px;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    resize: none;
    font-size: 16px; /* Larger text for readability */
    box-sizing: border-box; /* Ensure padding doesn't exceed box size */
}

.form-group input[type="submit"] {
    padding: 12px 24px; /* Adjust padding for a better button size */
    background-color: #003300;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 20px; /* Space between form and button */
    align-self: center; /* Center the button */
}

.form-group input[type="submit"]:hover {
    background-color: #005500;
}

    </style>
    <script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
    <link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="wrapper">
    <?php include "Header.php"; ?>
  
    <div class="content">
        <h2>Welcome <?php echo $_SESSION['Name']; ?></h2>
        <form id="form1" name="form1" method="post" action="InsertFeedback.php">
            <div class="form-group">
                <label for="txtFeedback">Feedback:</label>
                <textarea name="txtFeedback" id="txtFeedback"></textarea>
                <span class="textareaRequiredMsg">A value is required.</span>
            </div>
            <div class="form-group">
                <input type="submit" name="button" id="button" value="Submit Feedback" />
            </div>
        </form>
    </div>
    <div style="clear:both;"></div>
    <?php include "Footer.php"; ?>
</div>
<script type="text/javascript">
    var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>
</body>
</html>
