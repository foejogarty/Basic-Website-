<!DOCTYPE HTML>
<html lang="en">
<head>
  <title> Display All Products </title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/styles.css">
 </head>
<body>
<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="news.php"> News</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)"class="dropbtn" onclick="myFunction()">Products</a>
    <div class= "dropdown-content" id="myDropdown">
      <a href="displayallproducts.php?categoryid=1">Flowers</a>
      <a href="displayallproducts.php?categoryid=2">Baby Girl</a>
      <a href="displayallprodcuts.php?categoryid=3">Baby Boy</a>
    </div>
  <li><a href="getcomments.php">Testimonials</a></li>
   <li><a href="#contact">Contact US</a></li>
   <li>
</ul>
 
<div id="displayproducts">
<?php
$server="localhost";
$dbuser="root";
$password="";
$link=mysqli_connect($server,$dbuser,$password);
mysqli_select_db($link, "giftcompany.sql");

$sql="SELECT * from products";
$result=mysqli_query($link, $sql);

echo "<table>";
echo "<tr>
 <td><strong>Image</td>
 <td><strong>Product</td>
 <td><strong>Price</td>
 <td><strong>Desciption</td>
 <td><strong>Details</td>
 </tr>";
while($row=mysqli_fetch_array($result)) {
 $productid=$row["productid"];
 $image=$row["image"];
 $product=$row["productname"];
 $productdesc=$row["description"];
 $price=$row["price"];
 echo "<tr>
  <td><img src='$image' width=100 height=100></td>
  <td>$product</td>
  <td>&euro; $price</td>
  <td>$productdesc</td>
  <td><a href='moredetails.php?productid=$productid'>Details</a></td>
  </tr>";
}
echo "</table>";
mysqli_close($link);
?>
</div>
</div>
</body>
</html>
