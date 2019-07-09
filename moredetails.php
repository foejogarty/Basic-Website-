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


<div id="content">
 
<?php
$server="localhost";
$dbuser="root";
$password="";
$link=mysqli_connect($server,$dbuser,$password);
mysqli_select_db($link, "giftcompany");

$productid= $_GET["productid"];
$sql="SELECT* FROM products WHERE productid=$productid";
$result= mysqli_query($link, $sql);
$row=mysqli_fetch_array($result);

 $product=$row["productname"];
 $price=$row["price"];
 $description=$row["description"];
 $longdescription=$row["longdescription"];
 $image=$row["image"];
echo "<h2>$product</h2>
<br>
<img src='$image' width=200 height=200' border=3px>
<h3>";
echo "Product Description";
echo "</h3> $description;
<br> <h3>";
echo "Product Details";
echo "</h3> $longdescription;
<h3>";
echo "Price";
echo "</h3> &euro; $price";
mysqli_close($link);
?>
<p>
<button onclick="goBack()">Go Back to Product Listing</button>
<script>
function goBack() {
 window.history.back();
}
</script>
</p>
$productid= $_GET["productid"];
$sql= "SELECT * FROM products WHERE productid=$productid";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_array($result); 
</div>

<button onclick="goBack()">Go Back to Product Listing</button>
<script>
function goBack() {
 window.history.back();
}
</script>
-------------------------------

</body>
</html>
