<!DOCTYPE html>
<html>
    
<head>
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom.css"/>
    
<title>Processed Jobs</title>
</head>
    
    
<body style="background-image: url(images/bg.jpg)">

    
<div id="header">
    <div class="header wrapper">
        <div class="sandwichButton"></div>
        
            <div class="logo">
            <h1><font size=8 color="white">WORD TASK SERVER v1.0</font></h1>
            
            </div>
    </div>
</div>
    
        
<div>
    
    <h1><center><font color="#FFFFFF">LIST OF PROCESSED JOBS</font></center></h1>
    
    
    <span style="position:absolute;z-index:57;left:-394px;top:-4px;width:1718px;height:2px">
        <img width="2000" height="2" src="images/line.gif">
    </span>
    


    
    </div>

<table class='table-bordered' style="margin-left:100px;">
    
    <?php
require_once('connect.php');


$data=mysqli_query($con,"select * from ready");

echo "<th>UserID</th><th>Task</th><th>String</th><th>Date</th><th>Month</th><th>Year</th><th>Hours</th><th>Minutes</th><th>Seconds</th><th>Process Time</th>";
    
    
while($row=mysqli_fetch_array($data)){
	

	echo "<tr><td>".$row['UserID']."</td><td>".$row['Task']."</td><td>".$row['String']."</td><td>".$row['Date']."</td><td>".$row['Month']."</td><td>".$row['Year']."</td><td>".$row['Hours']."</td><td>".$row['Minutes']."</td><td>".$row['Seconds']."</td><td>".$row['process_time']."</td></tr>";
	
	
	}

    
    
    
    
    

$con=NULL;


?>
    

</table>
    



    
<br/>
    
    
      <div>
          <a href="admin.php"><font size=9 color="white">BACK</font></a>
    </div>
      

    


</body>
</html>