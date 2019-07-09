<!DOCTYPE HTML>
<html lang="en">
<head>
  <title> Update Comments </title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/styles.css">
 </head>
<body>
<div id="container">
<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
<div id="content">
 <h3> Update Testimonials </h3> 
<p> Administrators will be able to approve and delete testimonials</p>


<?php
require'connect.php';
$id=$_GET["id"];
$sql="UPDATE comment SET status='planned' WHERE id=$id";
$retval=mysqli_query($link,$sql);

if(! $retval )
{
 die('Could not update data: ' . mysql_error());
}
else
{
 header("Location: http://localhost/giftcompany/managecomments.php");
 exit;
}
mysqli_close($link);
?>


</div>

</div>
</body>
</html>
