
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$UserName = $_POST['txtUserName'];
$Password = $_POST['txtPassword'];

// Hash the password using Bcrypt
$hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

$con = mysqli_connect("localhost", "root", "", "shopping");

$sql = "INSERT INTO Admin_Master (UserName, Password) VALUES (?,?)";

$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $UserName, $hashedPassword);

if ($stmt->execute()) {
    echo '<script type="text/javascript">alert("User Inserted Successfully");window.location=\'User.php\';</script>';
} else {
    echo "Error: ". $sql. "<br>". mysqli_error($con);
}

mysqli_close($con);

?>
</body>
</html>
