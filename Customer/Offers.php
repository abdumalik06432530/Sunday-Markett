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
    <title>Fidel CLOTH SHOPPING</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .offer-card {
         
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .offer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 4rem;
            font-weight: bold;
        }

        .card-text {
            color: #555;
        }

        .valid-date {
            font-size: 0.9rem;
            color: #888;
        }
        
        #color{
            background:#ffcccc;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <?php include "Header.php"; ?>

        <div id="content" class="container mt-5">
            <h2 class="text-success">Welcome, <?php echo htmlspecialchars($_SESSION['Name']); ?></h2>
            
            <div class="row mt-4">
                <?php
                $con = mysqli_connect("localhost", "root", "", "shopping");

                if (!$con) {
                    die("Database connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM Offer_Master";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div   class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card offer-card shadow-sm">
                                <div id="color" class="card-body text-center">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['Offer']); ?></h5>
                                    <p class="card-text"><?php echo htmlspecialchars($row['Detail']); ?></p>
                                    <p class="valid-date">Valid Until: <?php echo htmlspecialchars($row['Valid']); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo '<div class="col-12"><p class="text-center text-danger">No offers available at the moment.</p></div>';
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
