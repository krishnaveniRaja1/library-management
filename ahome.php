<?php
session_start();
include "database.php";
function countRecord($sql,$db)
{
	$res=$db->query($sql);	
	return $res->num_rows;
}
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
<h3 id="heading">WELCOME ADMIN</h3>
<div id="center">
<ul class="record">
<li>TotaL students:<?php echo countRecord("select *from students",$db); ?></li>
<li>Total book:<?php echo countRecord("select *from book",$db); ?></li>
<li>Total request:<?php echo countRecord("select *from request",$db); ?></li>
<li>Total comment:<?php echo countRecord("select *from comment",$db); ?></li></ul>
</div></div>
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