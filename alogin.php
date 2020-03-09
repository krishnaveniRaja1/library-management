<?php
session_start();
 include "database.php";
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
<h1>E-LIBRARY MANAGEMENT SYSTEM</h1>
</div>
<div id="wrapper">
<h3 id="heading">Admin Login Here</h3>
<div id="center">
<?php
  if(isset($_POST["submit"]))
  {
	   $sql="SELECT * FROM admin where ANAME='{$_POST["aname"]}' and APASS='{$_POST["apass"]}'";
  $res=$db->query($sql);
  if($res->num_rows>0)
  {
	  $row=$res->fetch_assoc();
	  $_SESSION["AID"]=$row["AID"];
	  $_SESSION["ANAME"]=$row["ANAME"];
	  $_SESSION["APASS"]=$row["APASS"];
	  header("location:ahome.php");
  }
  else
  {
	  echo"<p class='error'>Invalid User Details</p>";
  }
  }
?>
<form action="alogin.php" method="post">
<label>Name</label>
<input type="text" name="aname" required><br><br>
<label>Password</label>
<input type="password" name="apass" required><br><br>
<center><button type="submit" name="submit">Login Now</button></center> 
</form></div>
</div>
<div id="navi">
<?php
 include "sidebar.php";
 ?></div>
</div>
<div id="footer"><p>Copyright &copy;tnlibrary</p>
</div>
</div>
</body>
</html>