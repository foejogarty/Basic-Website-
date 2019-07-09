<!DOCTYPE HTML>
<html lang="en">
<head>
  <title> Manage Comments </title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/styles.css">
 </head>
<body>
<div id="container">
<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
<div id="content">
 <h3> Manage Testimonials </h3> 
<p> Administrators will be able to approve and delete testimonials</p>


<?php
$server="localhost";
$dbuser="root";
$password="";
$link=mysqli_connect($server,$dbuser,$password);
mysqli_select_db($link,"giftcompany.sql");
$sql="SELECT* from comment ";
$result=mysqli_query($link,$sql);
echo "<table>";
echo "<tr>
 <td><strong>Title</td>
 <td><strong>Content</td>
 <td><strong>Author</td>
 <td><strong>Created</td>
 <td><strong>Status</td>
 <td><strong>Update</td>
 <td><strong>Delete</td>
</tr>";
while($row=mysqli_fetch_array($result)){
 $title=$row["title"];
 $content=$row["content"];
 $author=$row["author_name"];
 $created=$row["created_at"];
 $status=$row["status"];
 $update=$row["update"];
 $delete=$row["delete"];
echo"<tr>
 <td>$title</td>
 <td>$content</td>
 <td>$author</td>
 <td>$created</td>
 <td>$status</td>
 <td>$update<a href='updatecomment.php?id=$id'>Approve</a></td>
 <td>$delete<a href='deletecomment.php?id=$id'>Delete</a></td>
 </tr>";
}
echo "</table>";
 mysqli_close($link);
?>
</div>



 <div id="managetestimonial">




  
  
 </div>
</div>
</body>
</html>
