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
<h3 id="heading">VIEW STUDENT DETAILS</h3>
<?php
    $sql="SELECT * FROM students ";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{
		echo "<table>
		<tr>
		<th>SNO</th>
	    <th>NAME</th>
		<th>MAIL</th>
		<th>DEP</th>
		</tr>
		";
		$i=0;
		while($row=$res->fetch_assoc())
		{
			$i++;
			echo"<tr>";
			echo"<td>{$i}</td>";
			echo"<td>{$row["NAME"]}</td>";
			echo"<td>{$row["MAIL"]}</td>";
			echo"<td>{$row["DEP"]}</td>";
		    echo"</tr>";
		}
		echo"</table>";
	}
	else
	{
		echo" <p class='error'>No Students record found</p>";
	}
?>
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