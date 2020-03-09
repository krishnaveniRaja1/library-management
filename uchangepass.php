<?php
session_start();
include "database.php";
if(!isset($_SESSION["ID"]))
{
	header("location:ulogin.php");
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
<h3 id="heading">CHANGE PASSWORD</h3>
<div id="center">
<?php
if(isset($_POST["submit"]))
{
$sql="SELECT * from students WHERE PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
$res=$db->query($sql);
if($res->num_rows>0)
{
	$s="update students set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
	$db->query($s);
	echo "<p class='success'>password changed successfully</p>";
}
else
{
	echo "<p class='error'>invalid password</p>";
}
}
?>
<form action ="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<label>old password</label>
<input type="password" name="opass" required>
<label>new password</label>
<input type="password" name="npass" required>
<button type="submit" name="submit">Update Password</button>
</form></div>
</div>
<div id="navi">
<?php
 include "usersidebar.php";
 ?></div>
</div>
<div id="footer"><p>Copyright &copy;tnlibrary</p>
</div>
</div>
</body>
</html>