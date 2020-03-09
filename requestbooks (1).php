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
<h3 id="heading">NEW BOOK REQUEST</h3>
<div id="center">
<form action ="/project/requestbooks.php" method="post">
<label> message</label>
<textarea required name="mes" ></textarea>
<button type="submit" name="submit">send message</button>
</form></div>
</div>
<div id="navi">
<ul>
<li><a href="uhome.php">Home</a></li>
<li><a href="searchstudent.php">search books</a></li>
<li><a href="requestbooks.php">request</a></li>
<li><a href="uchangepass.php">changepassword</a></li>
<li><a href="logout.php">Logout</a></li>
</ul></div>
</div>
<div id="footer"><p>Copyright &copy;tnlibrary</p>
</div>
</div>
</body>
</html>