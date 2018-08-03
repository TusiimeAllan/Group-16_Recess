<html>
<head>
<title> Welcome </title>    
</head>

    <body>
    <h1>
        <center>Recess</center>
    </h1>
        
        <hr/>
       <?php
    //INPUTTING DATA INTO THE DATABASE
        
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
        
    
    
    
    
    
    </body>

</html>