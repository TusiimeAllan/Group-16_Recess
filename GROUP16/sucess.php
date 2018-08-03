<!DOCTYPE html>
<html>
    
<head>
    
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="css/custom.css"/>
       
<title>Sucess Percentage</title>
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
    
    <h1><center><font color="#2291bf">SUCESS</font> <font color="#FFFFFF">PERCENTAGE</font></center></h1>
    
     <span style="position:absolute;z-index:57;left:-394px; top:-7px; width:1718px;height:2px">
        <img width="2000" height="2" src="images/line.gif">
    </span>
    
    
 
    </span>
    
</div>
    
    
    
    

        
   <table class='table-bordered' style="margin-left:470px;"> 
       
    <?php
       
       
require_once('connect.php');


$data=mysqli_query($con,"select * from ready");
       
echo "<th>Job</th><th>Tasks that Suceeded</th><th>Percentage</th>";
    



$datadouble=mysqli_query($con,"select Task from ready where Task='double'");
$datarev=mysqli_query($con,"select Task from ready where Task='rev'");
$datareplace=mysqli_query($con,"select Task from ready where Task='replace'");
$datadelete=mysqli_query($con,"select Task from ready where Task='delete'");
$dataencrypt=mysqli_query($con,"select Task from ready where Task='encrypt'");
$datadecrypt=mysqli_query($con,"select Task from ready where Task='decrypt'");
       
$waitdouble=mysqli_query($con,"select Task from waiting where Task='double'");
$waitrev=mysqli_query($con,"select Task from waiting where Task='rev'");
$waitreplace=mysqli_query($con,"select Task from waiting where Task='replace'");
$waitdelete=mysqli_query($con,"select Task from waiting where Task='delete'");
$waitencrypt=mysqli_query($con,"select Task from waiting where Task='encrypt'");
$waitdecrypt=mysqli_query($con,"select Task from waiting where Task='decrypt'");   
       
$blackdouble=mysqli_query($con,"select Task from blacklist where Task='double'");
$blackrev=mysqli_query($con,"select Task from blacklist where Task='rev'");
$blackreplace=mysqli_query($con,"select Task from blacklist where Task='replace'");
$blackdelete=mysqli_query($con,"select Task from blacklist where Task='delete'");
$blackencrypt=mysqli_query($con,"select Task from blacklist where Task='encrypt'");
$blackdecrypt=mysqli_query($con,"select Task from blacklist where Task='decrypt'"); 
       
       
$totaldouble =  mysqli_num_rows($datadouble) + mysqli_num_rows($waitdouble) + mysqli_num_rows($blackdouble);  
$totalrev = mysqli_num_rows($datarev) + mysqli_num_rows($waitrev) + mysqli_num_rows($blackrev);
$totalreplace = mysqli_num_rows($datareplace) + mysqli_num_rows($waitreplace) + mysqli_num_rows($blackreplace);
$totaldelete = mysqli_num_rows($datadelete) + mysqli_num_rows($waitdelete) + mysqli_num_rows($blackdelete);
$totalencrypt = mysqli_num_rows($dataencrypt) + mysqli_num_rows($waitencrypt) + mysqli_num_rows($blackencrypt);
$totaldecrypt = mysqli_num_rows($datadecrypt) + mysqli_num_rows($waitdecrypt) + mysqli_num_rows($blackdecrypt);
       
    
$sucessdouble = mysqli_num_rows($datadouble) - mysqli_num_rows($waitdouble) - mysqli_num_rows($blackdouble);
$sucessrev = mysqli_num_rows($datarev) - mysqli_num_rows($waitrev) - mysqli_num_rows($blackrev);
$sucessreplace = mysqli_num_rows($datareplace) - mysqli_num_rows($waitreplace) - mysqli_num_rows($blackreplace);
$sucessdelete = mysqli_num_rows($datadelete) - mysqli_num_rows($waitdelete) - mysqli_num_rows($blackdelete);
$sucessencrypt = mysqli_num_rows($dataencrypt) - mysqli_num_rows($waitencrypt) - mysqli_num_rows($blackencrypt);
$sucessdecrypt = mysqli_num_rows($datadecrypt) - mysqli_num_rows($waitdecrypt) - mysqli_num_rows($blackdecrypt);
       
       
//PERCENTAGE CALCULATIONS
       
$double_percent = (($sucessdouble / $totaldouble)*100);
$rev_percent = (($sucessrev / $totalrev)*100);
$replace_percent = (($sucessreplace / $totalreplace)*100);
$delete_percent = (($sucessdelete / $totaldelete)*100);       
$encrypt_percent = (($sucessencrypt / $totalencrypt)*100);       
$decrypt_percent = (($sucessdecrypt / $totaldecrypt)*100);
              
       
       
       
$con=NULL;
    
    ?>
    
<tr><td>double</td>
        <td><?php  echo $sucessdouble  ?> / <?php  echo $totaldouble  ?> </td><td><?php echo $double_percent ?>%</td></tr>
       
<tr><td>rev</td><td><?php  echo $sucessrev  ?> / <?php  echo $totalrev  ?></td><td><?php echo $rev_percent ?>%</td></tr>
       
<tr><td>delete</td><td><?php  echo $sucessreplace  ?> / <?php  echo $totalreplace  ?></td><td><?php echo $replace_percent ?>%</td></tr>
       
<tr><td>replace</td><td><?php  echo $sucessdelete  ?> / <?php  echo $totaldelete  ?></td><td><?php echo $delete_percent ?>%</td></tr>
       
<tr><td>encrypt</td><td><?php  echo $sucessencrypt  ?> / <?php  echo $totalencrypt  ?></td><td><?php echo $encrypt_percent ?>%</td></tr>
       
<tr><td>decrypt</td><td><?php  echo $sucessdecrypt  ?> / <?php  echo $totaldecrypt  ?></td><td><?php echo $decrypt_percent ?>%</td></tr>
        
    </table>
    
     <div>
          <a href="admin.php"><font size=9 color="white">BACK</font></a>
    </div>
    
        </body>
    
</html>