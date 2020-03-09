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
<h3 id="heading">SEND YOUR COMMENTS </h3>
<?php
if(isset($_POST["submit"]))
{
	  $sql="insert into comment(BID,SID,COMM,LOGS) values ({$_GET["id"]},{$_SESSION["ID"]},'{$_POST["mes"]}',now())";
    $db->query($sql);	  
}
$sql="SELECT * from BOOK where BID=".$_GET["id"];
$res=$db->query($sql);
if($res->num_rows>0)
{
	echo "<table>";
	$row=$res->fetch_assoc();
	echo"
	<tr>
	<th>BookName</th>
	<td>{$row["BTITLE"]}</td>
	</tr>
	<tr>
	<th>Keywords</th>
	<td>{$row["KEYWORDS"]}</td>
	</tr>
	";
	echo"</table>";
}
else
{
	echo"<p class='error'>No books found</p>";
}
?>
<div id="center">
<form action ="<?php echo $_SERVER["REQUEST_URI"];?>" method="post">
<label>your comments</label>
<textarea name="mes" required></textarea>
<button type="submit" name="submit">post now</button>
</form>
</div>
<?php
$sql="SELECT students.NAME,comment.COMM,comment.LOGS from comment inner join students on comment.SID=students.ID where comment.BID={$_GET["id"]} order by comment.CID desc";
$res=$db->query($sql);
if($res->num_rows>0)
{
	while($row=$res->fetch_assoc())
	{
		echo "<p><strong>{$row["NAME"]}: </strong>{$row["COMM"]}<i>{$row["LOGS"]}</i></p>";
	}
}
?>
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