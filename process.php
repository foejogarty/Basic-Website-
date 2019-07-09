<!DOCTYPE HTML>
<html lang="en">
<head>
  <title>My first HTML5 page</title>
  <meta charset="utf-8">
 <link rel="stylesheet" href="css/styles.css">
 </head>
<body>
<div id="container">
<?php include("includes/header.html");?>
<?php include("includes/nav.html");?>
<div id="content">
<?php
$server="localhost";
$dbuser="root";
$password="";
$link=mysqli_connect($server,$dbuser,$password);
mysqli_select_db($link,"giftcompany.sql");

$title=$_POST["title"];
$content=$_POST["content"];    
$author_name=$_POST["author_name"];
$email=$_POST["author_email"];
$sql_insert="INSERT INTO comment(title, content, author_name, author_email)
                                     VALUES ('$title', '$content', '$author_name', '$email')";
if(mysqli_query($link, $sql_insert)){
echo "<h3>Testimonial Added!</h3>Thank you for your feedback. Our administrators moderate all comments and it will be attended to shortly<p>";
echo "<a href='getcomments.php'>Return to Testimonials page</a>";}
else {
      echo "An error occurred, try again!";
}
mysqli_close($link);
?>

 <div id="addtestimonial">

<h3> Add a Testimonial</h3> 
<p> Please leave your feedback on your experience of our site. We appreciate your feedback and take all your comments into consieration</p>
<!--form for user to enter feedback-->
<form method="post" action="process.php" id="commentform">
<label> Title:</label>
<input type="text" name="title"><br>
<label>Content: </label>
<textarea name="content" rows="8" cols="30"></textarea><br>
<label> Name: </label>
<input type="text" name="author_name"><br>
<label> Email:</label>
<input type="email" name="author_email"><br>
<input type="submit" id="mysubmit" name="submit" value="Add Comment">

</form>
  
  
 </div>
<?php
$server="localhost";
$dbuser="root";
$password="";
$link=mysqli_connect($server,$dbuser,$password);
mysqli_select_db($link,"giftcompany.sql");
$sql="SELECT* from comment WHERE status='planned'";
$result=mysqli_query($link,$sql);
echo "<table>";
echo "<tr>
 <td><strong>Title</td>
 <td><strong>Content</td>
 <td><strong>Author</td>
 <td><strong>Created</td>
</tr>";
while($row=mysqli_fetch_array($result)){
 $title=$row["title"];
 $content=$row["content"];
 $author=$row["author_name"];
 $created=$row["created_at"];
echo "<tr>
 <td>$title</td>
 <td>$content</td>
 <td>$author</td>
 <td>$created</td>
 </tr>";
}
echo "</table>";
 mysqli_close($link);
?>
</div>
<?php include("includes/footer.html");?>
</div>
</body>
</html>
