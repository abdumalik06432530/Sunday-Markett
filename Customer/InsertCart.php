<?php
if(!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE CLOTH SHOPPING</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        #wrapper {
            width: 40%;
            max-width: 600px;
            margin: auto;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            color: #003300;
        }
        .item-card {
            display: flex;
            flex-direction: column;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            transition: box-shadow 0.3s;
        }
        .item-card:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .item-image {
            max-width:70%;
            height:50%;
            border: 4px solid #ddd;
            border-radius: 5px;
        }
        .btn {
            background: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #218838;
        }
        .responsive-table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .responsive-table td {
            padding: 10px;
        }
        @media (max-width: 600px) {
            .item-card {
                flex-direction: column;
            }
        }
    </style>
    <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
    <?php include "Header.php"; ?>
    <div id="content">
        <h2>Welcome <?php echo $_SESSION['Name']; ?></h2>
        <?php
        $Id = $_GET['ItemId'];
        $con = mysqli_connect("localhost", "root", "", "shopping");
        $sql = "SELECT * FROM Item_Master WHERE ItemId=" . $Id;
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        ?>
        <div class="item-card">
            <h3><?php echo $row['ItemName']; ?></h3>
            <img src="../Products/<?php echo $row['Image']; ?>" alt="Item Image" class="item-image" />
            <p><strong>Description:</strong> <?php echo $row['Description']; ?></p>
            <p><strong>Size:</strong> <?php echo $row['Size']; ?></p>
            <p><strong>Price:</strong> <?php echo $row['Price']; ?></p>
            <p><strong>Discount:</strong> <?php echo $row['Discount']; ?></p>
            <form method="post" action="Insert.php?Id=<?php echo $Id; ?>">
                <label for="txtQty">Quantity:</label>
                <input type="text" name="txtQty" id="txtQty" value="1" required />
                <input type="submit" class="btn" value="Add To Cart" />
            </form>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
<script type="text/javascript">
    var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>