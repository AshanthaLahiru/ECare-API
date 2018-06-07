<?php


$email=$_POST['email'];
$pw=$_POST['password'];

// Create connection
$username = "sandupa_mctestus"; 
$password = "fvKwole3P6pcZJubTE"; 
$hostname = "localhost"; //Change here
$dbhandle = mysqli_connect($hostname, $username, $password,"sandupa_mctestapi") or die("Unable to connect to MySQL");





$result1 = mysqli_query($dbhandle,"SELECT * FROM Patient where email='".$email."'");

while($row = mysqli_fetch_array($result1))
{
	//$heartbeat = $row['hb'];
	
	if($row['password']==$pw)
	{
		$message="TRUE";
		$name=$row['name'];
		$id=$row['id'];
	}
	else
		$message="FALSE";
}

echo json_encode(array("message" => $message,"name" => $name,"id" => $id));

mysqli_close($dbhandle);


//----------------------------


//echo json_encode(array("hb"=> 80));

?>