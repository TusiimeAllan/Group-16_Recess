<!DOCTYPE html>
<html>
    
<head>
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom.css"/>
       
<title>Administrator</title>
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
    
  
    
    
  
    
    <div style="width:2px; height:2px; overflow:hidden">
    style="position:absolute;z-index:57;left:-394px; top:-7px; width:1718px;height:2px"
    
    <?php
    //INPUTTING DATA INTO THE DATABASE
        
        
        
        //THE BUSY LIST
        $file = fopen("files/busy_list.txt","r");
        
        if ($file==NULL){
            
            echo "Empty document";
            
        }else{
        
        while(!feof($file)){
            
            $content = fgets($file);
            $carray = explode(";",$content);
            
            $no;
            list($no,$functio,$task,$date,$month,$year,$Hours,$minutes,$seconds) = $carray;
            
            require_once('connect.php');
	
	$save=mysqli_query($con,"insert into waiting(No,UserID,Task,String,Date,Month,Year,Hours,Minutes,Seconds)values(null,'$no','$functio','$task','$date','$month','$year','$Hours','$minutes','$seconds')");
            
        
            
            
        }
            
            fclose($file);
        
         unlink('files/busy_list.txt');  
            
            }
        
        
        
        
        
        
        
        
        
        
        
        
        
        //BLACKLISTED JOBS
        $file = fopen("files/blacklist.txt","r");
        
        if ($file==NULL){
            
            echo "Empty document";
            
        }else{
        
        while(!feof($file)){
            
            $content = fgets($file);
            $carray = explode(";",$content);
            
            $no;
            list($no,$functio,$date,$month,$year,$Hours,$minutes,$seconds) = $carray;
            
            require_once('connect.php');
	
	$save=mysqli_query($con,"insert into blacklist(No,UserID,Task,Date,Month,Year,Hours,Minutes,Seconds)values(null,'$no','$functio','$date','$month','$year','$Hours','$minutes','$seconds')");
            
        
            
            
        }
            
            fclose($file);
        
         unlink('files/blacklist.txt');  
            
            }
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        //PROCESSED JOBS
        $file = fopen("files/ready_jobs.txt","r");
        
        if ($file==NULL){
            
            echo "Empty document";
            
        }else{
        
        while(!feof($file)){
            
            $content = fgets($file);
            $carray = explode(";",$content);
            
            $no;
            list($no,$functio,$task,$date,$month,$year,$Hours,$minutes,$seconds,$process_time) = $carray;
            
            require_once('connect.php');
	
	$save=mysqli_query($con,"insert into ready(id,no,func,task,Date,Month,Year,Hours,Minutes,Seconds,process_time)values(null,'$no','$functio','$task','$date','$month','$year','$Hours','$minutes','$seconds','$process_time')");
            
        
            
            
        }
            
            fclose($file);
        
         unlink('files/ready_jobs.txt');  
            
            }
        
         
        
        ?>
        
       
    
    
    </div>
    
    
    
    
    
    
    
<div>
    
    <h1><center><font color="#FFFFFF">ADMINISTRATOR</font></center></h1>
        
<div class="buttons">
    
    
    <span style="position:absolute;z-index:57;left:-394px; top:-7px; width:1718px;height:2px">
        <img width="2000" height="2" src="images/line.gif">
    </span>
    
    
    <span style="position:absolute;z-index:56;left:-372px; top:108px; width:1718px;height:2px">
        <img width="2000" height="2" src="images/line.gif">
    </span>
    
    
    
<form method="post">

    <span style="position:absolute;z-index:53; left:132px;top:200px;width:228px;height:68px">
        <input class='' type="number" name="duration" style="padding=20px, width=45px,border=5px,color=black" />
    </span>
    
    
    <span style="position:absolute;z-index:53; left:132px;top:231px;width:228px;height:68px">
        <input class='btn btn-primary' type="submit" name="submit" value="CALCULATE AVERAGE" style="padding=20px, width=45px,background=pink,border=5px,color=#FFF" />
    </span>
     
    
    
      
      
    <?php
    //select AVG(process_time) as averageprocess from ready;
    
    if (isset($_POST['submit'])){
        
    $duration=$_POST['duration'];
        
        
        
        
        
        require_once("connect.php");
        $db=$con;

            
            $calculate=mysqli_query($db,"select AVG(process_time) as averageprocess from ready");
        
        $row=mysqli_fetch_array($calculate);
        
        
         
        
            
        ?>    
       <br/> 
    
    <span style="position:absolute;top:236.25pt; left:108.0pt;z-index:6">
        
      <?php 
    
     echo $row['averageprocess']." Seconds/Job<br/>";
        
        if(isset($duration) && $duration>0){
            
            
           $output=($row['averageprocess'])/ $duration;
            
            
            echo 'Rate '.$output." Seconds/Job<br/>"; 
            
            
        }else{
            
         echo $row['averageprocess']." Seconds/Job<br/>";      
            
        }
    
    ?>
        

</span>
     
    
    <?php
    
     }   
    
    ?>
    
</form>
    
    
    <span style='position:absolute;z-index:9;left:440px;top:388px;width:296px;height:172px'>
        <a href="#">
            <img class="button" border=0 width=296 height=172 src="images/Waiting%20jobs%20origis%20under.gif">
        </a>
    </span>
    
    
    <span style='position:absolute;z-index:10;left:448px;top:394px;width:280px;height:160px'>
        <a href="view_waiting.php"><img class="button" border-radius=30 border=0 width=280 height=160 src="images/Waiting%20jobs%20origis%20top.gif"></a>
    </span>
    
        
    
    
    <span style='position:absolute;z-index:11;left:776px;top:388px;width:296px;height:172px'>
        <img class="button" width=296 height=172 src="images/Waiting%20priorities%20origis%20under.gif">
    </span>
    
    
    <span style='position:absolute;z-index:12; left:784px;top:394px;width:280px;height:160px'>
        <a href="#">
            <img class="button" border=0 width=280 height=160 src="images/Waiting%20priorities%20origis%20top.gif">
        </a>
    </span>
    
    
    <span style='position:absolute;z-index:13;left:776px;top:205px;width:296px;height:175px'>
        <img class="button" width=296 height=175 src="images/Failure%20bg%20origis.gif">
    </span>
    
    
    <span style='position:absolute;z-index:14;left:784px;top:212px;width:280px;height:160px'>
        <a href="failure.php"><img class="button" border=0 width=280 height=160 src="images/Failure%20Origis%20top.gif"></a>
    </span>
    
    
    <span style='position:absolute;z-index:15;left:100px;top:388px;width:296px;height:172px'>
        <img class="button" width=296 height=172 src="images/Ready%20jobs%20origis%20under.gif">
    </span>
    
    <span style='position:absolute;z-index:16; left:108px;top:394px;width:280px;height:160px'>
        <a href="view_ready.php">
            <img class="button" border=0 width=280 height=160 src="images/Ready%20jobs%20origis%20top.gif">
        </a>
    </span>
    
    
    <span style='position:absolute;z-index:52;left:441px;top:205px;width:296px;height:172px'>
        <img class="button" width=296 height=172 src="images/Sucess%20origis%20under.gif">
    </span>
    
    
    <span style='position:absolute;z-index:53;left:450px;top:212px;width:280px;height:160px'>
        <a href="sucess.php"><img class="button" width=280 height=160 src="images/Sucess%20origis%20top.gif"></a>
    </span>
    
    

    </div>
    </div>

</body>
</html>