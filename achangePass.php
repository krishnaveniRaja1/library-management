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
<h3 id="heading">CHANGE PASSWORD</h3>
<div id="center">
<?php
if(isset($_POST["submit"]))
{
$sql="SELECT * from admin WHERE APASS='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
$res=$db->query($sql);
if($res->num_rows>0)
{
	$s="update admin set APASS='{$_POST["npass"]}' WHERE AID=".$_SESSION["AID"];
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
 include "adminsidebar.php";
 ?></div>
</div>
<div id="footer"><p>Copyright &copy;tnlibrary</p>
</div>
</div>
</body>
</html>