<?php

$email=$_POST['email'];
$pw=$_POST['password'];
$name=$_POST['name'];

// Create connection
$username = "sandupa_mctestus"; 
$password = "fvKwole3P6pcZJubTE"; 
$hostname = "localhost"; //Change here
$dbhandle = mysqli_connect($hostname, $username, $password,"sandupa_mctestapi") or die("Unable to connect to MySQL");


$result = mysqli_query($dbhandle,"insert into Patient(name,email,password) values('".$name."','".$email."','".$pw."')");


if($result==true)
	echo "Success";
else
	echo "FAIL";

$userid = mysqli_query($dbhandle,"SELECT * FROM Patient where email='".$email."'");

while($row = mysqli_fetch_array($userid))
{
	$pid = $row['id'];
	
}

$result = mysqli_query($dbhandle,"insert into Heart(pid,hb) values('".$pid."','91')");

if($result==true)
	echo "Success";
else
	echo "FAIL";

$result = mysqli_query($dbhandle,"insert into Pressure(pid,pressure) values('".$pid."','90')");

if($result==true)
	echo "Success";
else
	echo "FAIL";


mysqli_close($dbhandle);


//----------------------------


//echo json_encode(array("hb"=> 80));

?>