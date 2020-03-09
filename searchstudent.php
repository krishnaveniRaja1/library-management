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
<h3 id="heading">SEARCH BOOK </h3>
<div id="center">
<form action ="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
<label> Enter book name or keywords</label>
<input type="text" name="name" required>
<button type="submit" name="submit">search book</button>
</form></div>
<?php
    if(isset($_POST["submit"]))
	{
    $sql="SELECT * FROM Book  where  BTITLE like '%{$_POST["name"]}%' or keywords like '%{$_POST["name"]}%'";
	$res=$db->query($sql);
	if($res->num_rows>0)
	{
		echo "<table>
		<tr>
		<th>SNO</th>
	    <th>BOOKNAME</th>
		<th>KEYWORDS</th>
		<th>VIEW</th>
		<th>COMMENT</th>
		</tr>
		";
		$i=0;
		while($row=$res->fetch_assoc())
		{
			$i++;
			echo"<tr>";
			echo"<td>{$i}</td>";
			echo"<td>{$row["BTITLE"]}</td>";
			echo"<td>{$row["KEYWORDS"]}</td>";
			echo"<td><a href='{$row["FILE"]}' target='_blank'>view</a></td>";
			echo"<td><a href='comment.php?id={$row["BID"]}'>go</a></td>";
		    echo"</tr>";
		}
		echo"</table>";
	}
	else
	{
		echo" <p class='error'>No Book record found</p>";
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