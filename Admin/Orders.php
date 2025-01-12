<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Cloth Shopping</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<style>
  body {
    background-color: #f8f9fa;
}

h2 {
    color: #007bff;
}

.card-header {
    background-color: #343a40;
    color: #fff;
}

.card-body {
    background-color: #ffffff;
}

table th, table td {
    text-align: center;
}

table th {
    background-color: #007bff;
    color: white;
}

</style>
<body>
    <div id="wrapper">
        
        <?php include "Header.php"; ?>
        
        <main id="content">
            <h2>Welcome Administrator</h2>
            <table class="order-details">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Shipping Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        session_start();
                        $con = mysqli_connect("localhost", "root", "", "shopping");

                        $sql = "SELECT customer_registration.CustomerId, customer_registration.CustomerName, shopping_cart_final.ItemName, 
                                    shopping_cart_final.Quantity, shopping_cart_final.Price, shopping_cart_final.Total 
                                FROM customer_registration 
                                JOIN shopping_cart_final 
                                ON customer_registration.CustomerId = shopping_cart_final.CustomerId";

                        $result = mysqli_query($con, $sql);

                        while($row = mysqli_fetch_array($result)) {
                            $Id = $row['CustomerId'];
                            $CustomerName = $row['CustomerName'];
                            $ItemName = $row['ItemName'];
                            $Quantity = $row['Quantity'];
                            $Price = $row['Price'];
                            $Total = $row['Total'];
                    ?>
                        <tr>
                            <td><?php echo $Id; ?></td>
                            <td><?php echo $CustomerName; ?></td>
                            <td><?php echo $ItemName; ?></td>
                            <td><?php echo $Quantity; ?></td>
                            <td><?php echo $Price; ?></td>
                            <td><?php echo $Total; ?></td>
                            <td><a href="Detail.php?CustomerId=<?php echo $Id; ?>">Shipping Address</a></td>
                        </tr>
                    <?php
                        }
                        mysqli_close($con);
                    ?>
                </tbody>
            </table>
        </main>

        
    </div>
</body>
</html>
