<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE CLOTH SHOPPING</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style>
        /* Grid container */
        
    </style>
</head>
<body>
<div id="wrapper">
    <?php include "Header.php"; ?>

    <div id="content">
        <h2>Welcome <?php echo $_SESSION['Name']; ?></h2>

        <div class="content">
            <?php
            $con = mysqli_connect("localhost", "root", "", "shopping");
            $sql = "SELECT sc.CustomerId, sc.ItemName, sc.Quantity, sc.Price, sc.Total, im.Image, im.Size
                    FROM shopping_cart_final AS sc
                    JOIN item_master AS im ON im.ItemName = sc.ItemName
                    WHERE sc.CustomerId = " . $_SESSION['ID'];
            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_array($result)) {
                $ItemName = $row['ItemName'];
                $Quantity = $row['Quantity'];
                $Price = $row['Price'];
                $Total = $row['Total'];
                $Size = $row['Size'];
                $Image = $row['Image'];
            ?>
            <div class="product">
                <div class="image-wrapper">
                    <img src="../Products/<?php echo $Image; ?>" alt="<?php echo $ItemName; ?>">
                </div>
                <div class="product-details">
                    <div class="product-name"><?php echo $ItemName; ?></div>
                    <div class="product-detail">Quantity: <?php echo $Quantity; ?></div>
                    <div class="product-detail">Price: <?php echo $Price; ?>:ETB</div>
                    <div class="product-detail">Size: <?php echo $Size; ?></div>
                    <div class="product-detail">Total: <?php echo $Total; ?>:ETB</div>
                </div>
            </div>
            <?php
            }
            mysqli_close($con);
            ?>
        </div>
    </div>

    
    <div style="clear:both;"></div>
    <?php include "Footer.php"; ?>
</div>
</body>
</html>
