<?php require_once('../Connections/shop.php'); ?>
<?php require_once('Connections/shop.php'); ?>
<?php
session_start();
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = stripslashes($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_GET['CategoryId'])) {
  $colname_Recordset1 = $_GET['CategoryId'];
}

$query_Recordset1 = sprintf("SELECT ItemId, ItemName, `Description`, `Size`, Image, Price, Discount, Total FROM item_master WHERE CategoryId = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysqli_query($shop, $query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);


$query_Recordset2 = "SELECT ItemId, ItemName, `Description`, `Size`, Image, Price, Discount, Total FROM item_master";
$Recordset2 = mysqli_query($shop, $query_Recordset2) or die(mysqli_error());
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Cloth Shopping</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
.card {
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.card-img-top {
    object-fit: cover;
    height: 200px;
}

.card-body {
    padding: 20px;
}

.btn-primary {
    background-color: #007BFF;
    border: none;
    transition: background-color 0.1s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.text-success {
    color: #28a745 !important;
}

</style>
</head>
<body>
<div id="wrapper">
  <?php include "Header.php"; ?>
  
  <div id="content" class="container mt-5">
    <h2 class="text-success">Welcome <?php echo $_SESSION['Name']; ?></h2>
    <div class="row">
        <?php if (mysqli_num_rows($Recordset2) > 0): ?>
            <?php do { ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="../Products/<?php echo htmlspecialchars($row_Recordset2['Image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row_Recordset2['ItemName']); ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo htmlspecialchars($row_Recordset2['ItemName']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($row_Recordset2['Description']); ?></p>
                            <p class="text-muted"><s>Price: <?php echo htmlspecialchars($row_Recordset2['Price']); ?> ETB</s></p>
                            <p class="text-danger">Discount: <?php echo htmlspecialchars($row_Recordset2['Discount']); ?>%</p>
                            <p class="font-weight-bold">Final Price: <?php echo htmlspecialchars($row_Recordset2['Total']); ?> ETB</p>
                            <a href="InsertCart.php?ItemId=<?php echo htmlspecialchars($row_Recordset2['ItemId']); ?>" class="btn btn-primary">Add to Cart</a>
                        </div>
                    </div>
                </div>
            <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2)); ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center">No items found.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Pagination Controls -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
            </div>

</html>

<?php
mysqli_free_result($Recordset1);
mysqli_free_result($Recordset2);
?>
