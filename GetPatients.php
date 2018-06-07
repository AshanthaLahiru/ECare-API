<?php

// Create connection
$username = "sandupa_mctestus"; 
$password = "fvKwole3P6pcZJubTE"; 
$hostname = "localhost"; //Change here
$dbhandle = mysqli_connect($hostname, $username, $password,"sandupa_mctestapi") or die("Unable to connect to MySQL");





$result1 = mysqli_query($dbhandle,"SELECT p.name,p.id,h.hb,pr.pressure,MAX(h.hid),Max(pr.id) from Patient p, Heart h, Pressure pr where p.id=h.pid and p.id=pr.pid and h.hid=(SELECT MAX(hid) from Heart where pid=p.id) and pr.id=(SELECT MAX(id) from Pressure where pid=p.id) GROUP BY p.id");
$arr = array();
while($row = mysqli_fetch_array($result1))
{
	
	
	//$heartbeat = $row['hb'];
	
	$arr[]=(array("name" => $row['name'],"hb" => $row['hb'],"pressure" => $row['pressure']));
	
}

echo json_encode(array('patient' => $arr));

mysqli_close($dbhandle);


//----------------------------


//echo json_encode(array("hb"=> 80));

?>