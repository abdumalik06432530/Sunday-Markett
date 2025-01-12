<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Online Cloth Shopping</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<div id="wrapper">
  
  <?php
  include "Header.php";
  ?>
  
  <div id="content">
    <h2><span> Feedback From Customers</span></h2>
    <table width="100%" border="1" bordercolor="#003300" >
      <tr>
        <th height="32" bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Id</strong></div></th>
        <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Customer Name</strong></div></th>
        <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Feedback</strong></div></th>
        <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style9 style5"><strong>Date</strong></div></th>
         <th bgcolor="#BDE0A8" class="style3"><div align="left" class="style12">Delete</div></th>
      </tr>
      <?php

$con = mysqli_connect("localhost","root", "", "shopping");

$sql = "select Feedback_Master.FeedbackId,Customer_Registration.CustomerName,Feedback_Master.Feedback,Feedback_Master.Date from Feedback_Master,Customer_Registration where Feedback_Master.CustomerId=Customer_Registration.CustomerId";

$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($result))
{
$Id=$row['FeedbackId'];
$Name=$row['CustomerName'];
$Feedback=$row['Feedback'];
$Date=$row['Date'];

?>
      <tr>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Id;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Name;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Feedback;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Date;?></strong></div></td>
        <td class="style3"><div align="left" class="style9 style5"><strong><a href="DeleteFeedback.php?FeedbackId=<?php echo $Id;?>">Delete</a></strong></div></td>
      </tr>
      <?php
}

$records = mysqli_num_rows($result);
?>
      <tr>
        <td colspan="5" class="style3"><div align="left" class="style12"><?php echo "Total ".$records." Records"; ?> </div></td>
      </tr>
      <?php

mysqli_close($con);
?>
    </table>
   <?php
 include "Footer.php";
 ?>
</div>
</body>
</html>
