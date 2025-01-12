<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order Confirmation</title>
</head>

<body>
<?php
    // Start the session
    session_start();

    // Check if session ID is set
    if (!isset($_SESSION['ID'])) {
        echo '<script type="text/javascript">alert("Session expired. Please log in again.");window.location=\'login.php\';</script>';
        exit();
    }

    // Establish a database connection
    $con = mysqli_connect("localhost", "root", "", "shopping");

    // Check connection
    if (mysqli_connect_errno()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    // Prepare and execute the SQL insert statement
    $stmt = $con->prepare("INSERT INTO Shopping_Cart_Final (CustomerID, ItemName, Quantity, Price, Total, OrderDate)
                           SELECT CustomerID, ItemName, Quantity, Price, Total, OrderDate FROM Shopping_Cart WHERE CustomerID = ?");
    $stmt->bind_param("i", $_SESSION['ID']);

    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }
    $stmt->close();

    // Prepare and execute the SQL delete statement
    $stmt = $con->prepare("DELETE FROM Shopping_Cart WHERE CustomerID = ?");
    $stmt->bind_param("i", $_SESSION['ID']);

    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }
    $stmt->close();

    // Close the database connection
    mysqli_close($con);

    // Redirect to Cart.php with a thank you message
    echo '<script type="text/javascript">alert("Thank You For Your order");window.location=\'Cart.php\';</script>';
?>
</body>
</html>
