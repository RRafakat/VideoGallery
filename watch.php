<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

$con = mysqli_connect("localhost","root","","video");

if (isset($_GET['id'])) 
{
	$id = $_GET['id'];
	$quary = mysqli_query($con,"SELECT * FROM uploaded WHERE id= '$id'");
	while ($row = mysqli_fetch_assoc($quary)) 
	{
		$name = $row['name'];
		$url = $row['url'];
	}

	echo "<h1 style='font-size:40px;'>You are watching $name <br/> </h1>";
	echo "<embed src='$url' width='560' height='560'></embed>";
}
else
{
	echo "Error!";
}
?>

</body>
</html>