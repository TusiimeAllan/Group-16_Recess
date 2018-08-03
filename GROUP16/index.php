<!DOCTYPE html>
<html>
<head>
    
<meta charset="UTF-8">
    
    <title>Word Task Server v1.0 - Admin</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrp.css">
    <link rel="stylesheet" type="text/css" href="css/home/auth.css">
    <link rel="stylesheet" type="text/css" href="css/home/bootstrap.min.css">
    
</head>
    
<body class="e">
        
    
            
<div id="header">
    <div class="header wrapper">
        <div class="sandwichButton"></div>
        
        <div class="logo">
            <h1><font size=8 color="white">WORD TASK SERVER v1.0</font></h1>
        </div>
        
    
    </div>
    
    <span style="position:absolute;z-index:57;left:-394px; top:-7px; width:1718px;height:2px">
        <img width="2000" height="2" src="images/line.gif">
    </span>
    
    
    <span style="position:absolute;z-index:56;left:-372px; top:80px; width:1718px;height:2px">
        <img width="2000" height="2" src="images/line.gif">
    </span>
    
    
                
    <div class="login-section" style="height:800px">
        <img src="images/profilepic.jpg" class="avatar" alt="profile_pic" style="margin-left: 500px;border-left-width:200px;">  
        <div class="section">
            <h2><font color="white">Login Here </font></h2>
            <br>
            
<form action="#" method="post">
                
    <div class="form-field" style="left: 500px;">
            <label class="form-field-label" style="color: rgb(255, 255, 255);">
                <span>UserName</span>
            </label>

            <div class="form-group">
            <span class="input-icon">
                <input autofocus="" class="form-control form-field-input" id="text" name="Name" required="" type="text" value="" aria-describedby="email-error" aria-invalid="false" style="width: 250px;height:40px">
            </span>
            </div>

            <div class="form-field-error form-field-error-email" style="display: none;">
                            <span id="email-error" class="help-block valid" style="display: inline;"></span></div>
    </div>                
             
    <div class="form-field" style="left: 500px;">
            <label class="form-field-label" style="color: rgb(255, 255, 255);">
                <span>Password</span>
            </label>

            <div class="form-group">
            <span class="input-icon">
                <input class="form-control form-field-input password" id="password" name="password" required="" type="password" aria-describedby="password-error" aria-invalid="false" style="width: 250px;height:40px">
            </span>
            </div>
    
                
    </div>
    
<input type="submit" name="btnsubmit" value="Login" style="width: 200px;height:40px; border-radius:10px">
                
                
    <br/><br/>
                
                
</form>
            </div>
    </div>
    </div>

    
</body>


    </html>
    
    
    <?php
if(isset($_POST['btnsubmit'])){
	
	
	$user=$_POST['Name'];
	$pass=$_POST['password'];
if(isset($user)  && isset($pass)){
	
	require_once('connect.php');
	
	
	
	$save=mysqli_query($con,"select * FROM administrators WHERE Name='$user' and Password='$pass'");
	
	$row=mysqli_fetch_array($save);

	
	if(mysqli_num_rows($save)>0){
		echo "User exists";
		
		header('Location:admin.php');
		
		}else{
			echo "Account does not exist";
			
			}
			
			
	}
}	
    
    
    
    
    
    
    ?>