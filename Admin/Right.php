<!-- Bootstrap CDN -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<style>
   .right {
 
  margin-top: 400px;
}


  .card {
    marging-top:300px;
    margin: 15px 0; /* Adds spacing between cards */
    border-radius: 8px; /* Rounds corners of cards */
  }

  .card-header {
    text-align: center; /* Centers the header text */
    padding: 15px; /* Adds padding inside the header */
  }

  .card-title {
    font-weight: bold; /* Makes the title text bold */
  }

  .btn {
    width: 100%; /* Makes the button stretch to full width */
    padding: 10px; /* Adds vertical padding to the button */
  }
</style>
<div class="right">
<div id="right-col" class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Add New Product</h2>
                </div>
                <div class="card-body">
                    <?php
                    $con = mysqli_connect("localhost", "root", "", "shopping");
                    if (mysqli_connect_errno()) {
                        echo "<div class='alert alert-danger'>Failed to connect to MySQL: " . mysqli_connect_error() . "</div>";
                        exit();
                    }
                    $sql = "SELECT * FROM Category_Master";
                    $result = mysqli_query($con, $sql);
                    ?>
                    <div class="row">
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $Id = $row['CategoryId'];
                            $CategoryName = $row['CategoryName'];
                        ?>
                            <div class="col-md-4 mb-3">
                                <div class="card border-primary">
                                    <div class="card-body text-center">
                                        <h5 class="card-title"><?php echo htmlspecialchars($CategoryName); ?></h5>
                                        <a href="Products.php?CategoryId=<?php echo $Id; ?>" class="btn btn-primary mt-3">
                                     Add prodact
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        mysqli_close($con);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    </div>
<!-- Optional Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
