<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Cloth Shopping</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-color: #f9f9f9;
        }
        .category {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 15px;
            text-align: center;
        }
        .category img {
            
            max-height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }
        .viewlink {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div id="wrapper" class="container mt-4">
    <?php include "Header.php"; ?>
    <div id="content"><br><br><br>
        <h2 class="text-center">Product Category</h2>
        <div class="row">
          <br><br>
            <?php
            $con = mysqli_connect("localhost", "root", "", "shopping");
            $sql = "SELECT * FROM Category_Master";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $Id = $row['CategoryId'];
                $CategoryName = $row['CategoryName'];
                $Description = $row['Description'];
                $Image = $row['Image'];
            ?>
                <div class="col-md-4">
                    <div class="category">
                        <div class="image_1">
                            <img src="Products/<?php echo htmlspecialchars($Image); ?>" alt="<?php echo htmlspecialchars($CategoryName); ?>" class="img-fluid" />
                        </div>
                        <div class="cat">
                            <div align="left" class="cat_name"><strong><?php echo htmlspecialchars($CategoryName); ?></strong></div>
                        </div>
                        <div class="dis_cr">
                            <div align="left" class="dis"><strong><?php echo htmlspecialchars($Description); ?></strong></div>
                        </div>
                        <div class="viewlink">
                            <a href="Products.php?CategoryId=<?php echo $Id; ?>" class="btn btn-primary">View Products</a>
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

<!-- Button for updating category -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#updateCategoryBtn').click(function() {
        var categoryId = $('#categoryId').val(); // Replace with actual input IDs
        var categoryName = $('#categoryName').val(); // Replace with actual input IDs
        var description = $('#description').val(); // Replace with actual input IDs
        
        $.ajax({
            url: 'admin/updateCategory.php',
            type: 'POST',
            data: {
                categoryId: categoryId,
                categoryName: categoryName,
                description: description
            },
            success: function(response) {
                alert('Category updated successfully!');
                // Optionally, refresh part of the page or show a success message
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error(textStatus, errorThrown);
                alert('Error updating category.');
            }
        });
    });
});
</script>
</body>
<?php include "Footer.php"; ?>
</html>