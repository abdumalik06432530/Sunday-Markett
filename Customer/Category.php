<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ONLINE CLOTH SHOPPING</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <style>
    .category-item {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 15px;
            text-align: center;
    }

    .category-item:hover {
      transform: scale(1.05);
    }

    .category-image {
           max-height: 150px;
            object-fit: cover;
            border-radius: 10px;
    }

    .card-body {
      text-align: center;
    }

    .category-item .card {
      border: none;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease-in-out;
    }

    .category-item .card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
      transition: background-color 0.2s ease-in-out;
    }

    .btn-primary:hover {
      background-color: #007bff;
    }
  #wrapper{
    padding-top:70px;

  }
  </style>
</head>
<body>
<div>
<?php include "Header.php"; ?>
</div>
  <div id="wrapper" class="container mt-2">
    <div id="content" class="row">
      <?php
      $con = mysqli_connect("localhost", "root", "", "shopping");
      if (!$con) {
          die("Connection failed: " . mysqli_connect_error());
      }
      $sql = "SELECT * FROM Category_Master";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result)) {
        $Id = $row['CategoryId'];
        $CategoryName = $row['CategoryName'];
        $Description = $row['Description'];
        $Image = $row['Image'];
      ?>
      <div class="col-md-3">
        <div class="category-item">
          <div class="card">
            <img src="../Products/<?php echo htmlspecialchars($Image); ?>" alt="<?php echo htmlspecialchars($CategoryName); ?>" class="category-image" />
            <div class="card-body">
              <h5 class="card-title"><?php echo htmlspecialchars($CategoryName); ?></h5>
              <p class="card-text"><?php echo htmlspecialchars($Description); ?></p>
              <a href="Products.php?CategoryId=<?php echo $Id; ?>" class="btn btn-primary">View Products</a>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      mysqli_close($con);
      ?>
    </div>
  </div>
  <?php include "Footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
