<?php

$id=$_POST['id'];

// Create connection
$username = "sandupa_mctestus"; 
$password = "fvKwole3P6pcZJubTE"; 
$hostname = "localhost"; //Change here
$dbhandle = mysqli_connect($hostname, $username, $password,"sandupa_mctestapi") or die("Unable to connect to MySQL");

$result1 = mysqli_query($dbhandle,"SELECT * FROM Heart where pid='".$id."' ORDER BY hid DESC LIMIT 1");

while($row = mysqli_fetch_array($result1))
{
	$heartbeat = $row['hb'];
}

$result1 = mysqli_query($dbhandle,"SELECT * FROM Pressure where pid='".$id."' ORDER BY id DESC LIMIT 1");

while($row = mysqli_fetch_array($result1))
{
	$pressure = $row['pressure'];
}

echo json_encode(array("hb" => $heartbeat, "pressure" => $pressure));

mysqli_close($dbhandle);


//----------------------------


//echo json_encode(array("hb"=> 80));

?>