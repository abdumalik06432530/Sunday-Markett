<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sunday Market</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding-top:0; /* Space for fixed navbar */
      margin:0;
    }
    #title {
      text-align: center;
      margin:0;
      padding: 0;
    }
    .navbar-nav{
      padding-left:0px;
    }
    .nav-item{
     margin-left:10px;
     padding-left:10px;
    }
    .container{
      background:White;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
<div class="container">
  <div class="nav-bar"><a class="navbar-brand" href="#">Sunday Market</a></div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Category.php">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Offers.php">Offers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Cart.php">Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Feedback.php">Feedback</a>
          <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<div>
</html>