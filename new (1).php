<?php
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
<h1>E-LIBRARY MANAGEMENT</h1>
</div>
<div id="wrapper">
<h3 id="heading">NEW USER REGISTRATION</h3>
<div id="center">
<?php 
if(isset($_POST["submit"]))
{
	  $sql="insert into students(NAME,PASS,MAIL,DEP) values ('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
    $db->query($sql);
    echo"<p class='success'>user registration success</p>";	  
}
?>
<form action ="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
<label>Name</label>
<input type="text" name="name" required>
<label>password</label>
<input type="password" name="pass" required>
<label>Email</label>
<input type="email" name="mail" required>
<select name="dep" required>
<option value="">select</option>
<option value="BCA">BCA</option>
<option value="B.SC">B.SC</option>
<option value="ME">ME</option>
<option value="BE">BE</option>
<option value="MCA">MCA</option>
<option value="M.SC">M.SC</option>
<option value="others">others</option>
</select>
<button type="submit" name="submit"> Register now</button>
</form></div>
</div>
<div id="navi">
<?php
 include "sidebar.php";
 ?></div>
<div id="footer"><p>Copyright &copy;tnlibrary</p>
</div>
</div>
</body>
</html>