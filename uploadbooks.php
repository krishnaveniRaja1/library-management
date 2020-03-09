<?php
session_start();
include "database.php";
if(!isset($_SESSION["AID"]))
{
	header("location:alogin.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>TN LIBRARY</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="container">
<div id="header">
<h1>E-LIBRARY MANAGEMENT</h1>
</div>
<div id="wrapper">
<h3 id="heading">upload books</h3>
<div id="center">
<?php 
if(isset($_POST["submit"]))
{
  $target_dir="upload/";
   $target_file=$target_dir.basename($_FILES["efile"]["name"]);
   if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
   {
	  $sql="insert into book(BTITLE,KEYWORDS,FILE) values ('{$_post["bname"]}','{$_POST["keys"]}','{$target_file}')";
    $db->query($sql);
    echo"<p class='success'>book uploaded success</p>";	  
   }
   else
   {
	   echo "<p class='error'>error in upload</p>";
}
}
?>
<form action ="<?php echo $_SERVER["PHP_SELF"];?>" method="post" entype="multipart/form-data">
<label>book title</label>
<input type="text" name="bname" required><br>
<label>keywords</label>
<textarea name="keys" required></textarea><br>
<label>upload file</label>
<input type="file" name="efile" required>
<br>
<button type="submit" name="submit">Upload book</button>
</form></div>
</div>
<div id="navi">
<?php
 include "adminsidebar.php";
 ?></div>
<div id="footer"><p>Copyright &copy;tnlibrary</p>
</div>
</div>
</body>
</html>