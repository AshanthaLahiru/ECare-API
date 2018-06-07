<!DOCTYPE html>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
       
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        
        <link rel="stylesheet" href="css/custom-styles.css">
        
		<link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/font-awesome-ie7.css">
		<style>
.redtext {
        color: red;
}
</style>
    </head>
	
    <body>
	
<?php
$username = "sandupa_mctestus"; 
$password = "fvKwole3P6pcZJubTE"; 
$hostname = "localhost"; //Change here

$connect_mysql= mysqli_connect($hostname, $username, $password,"sandupa_mctestapi") or die("Unable to connect to MySQL");

$query = "SELECT * FROM Patient";
$result=mysql_query($query) or die("Query Failed : ".mysql_error());
$i=0;
while($rows=mysql_fetch_array($result))
{
$roll[$i]=$rows['name'];
$i++;
}
$total_elmt=count($roll);
?>
            <div class="container">

                <div class="row-fluid">
                
                    <div class="span8 offset2">
                        	   
						   
						   
						   
						   
                        <div class="banner-shadow">
                        <div class="banner">
                            <div class="carousel slide" id="myCarousel">
                                        <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center><img src="img/dribble-1.gif" alt="" width="800" height="200" align="middle">
            </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                       
                        <div class="contact-info">
                            <center><img src="img/ecare.png" alt="" ></center>
							
                            <h2>Update Patient Details</h2>
                           
                              <form method="POST" action="">
								  
								  

		<div class="controls">  
    
<select name="name">
<option>Select patient</option>
<?php 
for($j=0;$j<$total_elmt;$j++)
{
?><option><?php 
echo $roll[$j];
?></option><?php
}
?>
</select><br />
	
								  
		</div>						  
                                     
                                 
								  <div class="controls">
								  <label class="redtext">Heart Beat</label>
								  <input name="heartbeat" type="text" class="span5" placeholder="Heart Beat Here.." /><br />
                                  </div>
								  <div class="controls">
								  <label class="redtext">Perssure</label>
								  <input name="pressure" type="text" class="span5" placeholder="Perssure here.." /><br />
                                  </div>
								  <div class="controls">
								  <label class="redtext">Suger</label>
								  <input name="suger" type="text" class="span5" placeholder="Suger here.." /><br />
                                  </div>
                                  <div class="controls">
                                      <button id="contact-submit" class="btn" name="submit" type="submit" value="Update"  >Submit</button>
                                  </div>
                              </form>
                            <?php

if(isset($_POST['submit']))
{
$name=$_POST['name'];
$heartbeat=$_POST['heartbeat'];
$pressure=$_POST['pressure'];

$query2 = "UPDATE Patient p, Heart h, Pressure pr SET h.hb='$heartbeat',pr.pressure='$pressure' WHERE p.name='$name'";
$result2=mysql_query($query2) or die("Query Failed : ".mysql_error());
echo "Successfully Updated";
}
?>
							
							
							

                        </div>
                        
                    </div>
                </div>
            </div>

    </body>
</html>
