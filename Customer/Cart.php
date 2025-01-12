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
    <title>ONLINE CLOTH SHOPPING</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .cart-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .cart-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .del {
            background-color: #dc3545;
            color: white;
            border: none;
            transition: background-color 0.3s;
        }

        .del:hover {
            background-color: #a71d2a;
        }

        .actionlinks {
            display:inline-flex;
            gap:20px;
        
            
        }

        .actionlinks img {
            width: 40px;
            height: auto;
        }

        .actionlinks a {
            text-decoration: none;
            color: inherit;
            text-align: center;
        }

        .actionlinks a p {
            margin-top: 5px;
            font-size: 10px;
            font-weight: 500;
        }
        .cart{
        display:inline;
        }
        h2.text-success {
    display: inline-block; /
    font-weight: bold; /* Make the text bold */
    color: #28a745; /* Bootstrap success color */
    text-align: center; /* Center the text */
    background-color: rgba(40, 167, 69, 0.1); /* Light green background */
    border-radius: 8px; /* Rounded corners */
    padding: 20px; /* Add padding */
    margin: 20px 0; /* Add vertical margin */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
    transition: transform 0.3s ease, color 0.3s ease; /* Smooth transition */
}

h2.text-success:hover {
    transform: scale(1.05); /* Slightly enlarge on hover */
    color: #155724; /* Darker green on hover */
}.actionlinks {
    padding-left: 500px; /* Default padding for larger screens */
}

/* Media query for mobile devices */
@media (max-width: 768px) { /* Adjust the max-width as needed */
    .actionlinks {
        padding-left: 20px; /* Reduced padding for mobile */
        padding-right: 20px; /* Optional: Add some right padding for mobile */
        justify-content: center; /* Center the links on mobile */
    }
}
    </style>
</head>
<body>
    <div id="wrapper">
        <?php include "Header.php"; ?>
        <div id="content" class="container mt-5">
            <h2 class="text-success text-center">Welcome <?php echo htmlspecialchars($_SESSION['Name']); ?></h2>
            <div class="actionlinks">
                <a href="checkout.php">
                    <img src="cartmy.jpg" alt="Proceed to Checkout" class="img-fluid">
                    <p>Order Here</p>
                </a>
                <a href="History.php">
                    <img src="pro.jpg" alt="Order History" class="img-fluid">
                    <p>History of Order</p>
                </a>
            </div>
    </div>
            <div class="row">
                <?php
                $con = mysqli_connect("localhost", "root", "", "shopping");

                if (!$con) {
                    die("Database connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT shopping_cart.CartId, shopping_cart.ItemName, shopping_cart.Quantity, shopping_cart.Total, item_master.Size, item_master.Image
                        FROM shopping_cart
                        JOIN item_master ON item_master.ItemName = shopping_cart.ItemName
                        WHERE shopping_cart.CustomerId = " . $_SESSION['ID'];

                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card cart-card shadow-sm">
                                <img src="../Products/<?php echo htmlspecialchars($row['Image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['ItemName']); ?>">
                                <div class="card-body">
                                    <h5 class="card-title"> <?php echo htmlspecialchars($row['ItemName']); ?></h5>
                                    <p class="card-text"><strong>Size:</strong> <?php echo htmlspecialchars($row['Size']); ?></p>
                                    <p class="card-text"><strong>Quantity:</strong> <?php echo htmlspecialchars($row['Quantity']); ?></p>
                                    <p class="card-text"><strong>Total:</strong> <?php echo htmlspecialchars($row['Total']); ?> ETB</p>
                                    <a href="DeleteCart.php?CartId=<?php echo htmlspecialchars($row['CartId']); ?>" class="btn del">Delete Item</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<div class="col-12 text-center"><p class="text-danger">Your cart is empty.</p></div>';
                }

                mysqli_free_result($result);
                mysqli_close($con);
                ?>
            </div>
        </div>

        <?php include "Footer.php"; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
