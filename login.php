<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
	<script type="text/javascript" src="./js/bootstrap.min.js"></script>
</head>
<body>


<?php

session_start();
class authorization
{
	

		public $user;
		public static $pwd;
	
	function getcredentials()

	

	{

		

		$_SESSION['$user'] = $_REQUEST['nm'];
		$_SESSION['$pwd'] = $_REQUEST['pass'];

		$obj1 = new Connection;
		echo $obj1->set_db_connection();
	}
}

class Connection
{

function set_db_connection()
{

$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "bootstrapui";

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//Check connection

if ($db->connect_error) 
{
	die("Connection failed - ".$db->connect_error);
}

//Query

$query = $db->query("Select username, password from login");

while ($row = $query->fetch_assoc())
{

	
	$x = $row['username'];
	$y = $row['password'];

	if($x == $_SESSION['$user'] && $y == $_SESSION['$pwd'])
	{
		header("Location:form2.html");

	}
	else
	{
		echo'<div class="alert alert-danger" role="alert">
  			Access Denied!
            </div>';

	}

}
}
}

$myobj = new authorization;
echo $myobj->getcredentials();



?>

</body>
</html>