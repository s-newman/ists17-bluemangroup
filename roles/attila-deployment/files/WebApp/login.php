<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang = "en">
   
   <head>
      <title>Election Donations</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
<html>
    <head>
        <title> Election Donations </title>
	<style>
		body {font-family: Arial;}

	/* Style the tab */
	.tab {
    		/*overflow: hidden;*/
    		border: 1px solid #ccc;
    		background-color: #f1f1f1;
align-items: center;																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																															justify-content: center;
	display: flex;
	}

	/* Style the buttons inside the tab */
	.tab button {
    		background-color: inherit;
    		float: left;
    		border: none;
    		outline: none;
    		cursor: pointer;
    		padding: 14px 16px;
    		transition: 0.3s;
    		font-size: 17px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
   		background-color: #ddd;
	}

	

	
</style>
    <head>
    <body>
	<div class="tab">
  		<input type="button" name="home" value="Home"  onclick="location.href='index.html'">
		<input type="button" name="login" value="Login"  onclick="location.href='login.php'">
	
	</div>
    
    </head>
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
           
         }
         
         h2{
            text-align: center;
            
         }
      </style>
      
   </head>
	
   <body>
      
      <h2>Enter Username and Password</h2> 
      <div class = "container form-signin">
         
         <?php
	    
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
	       $db = mysqli_connect('localhost','root','rockyou.txt-SUCKS!','DonationDatabase') or die ('Error connecting');
	       $name = $_POST['username'];
	       $query = "Select * from Users where user='$name';";
	       $result = mysqli_query($db, $query) or die('Error Querying');
	       $row = mysqli_fetch_row($result);
               $trim = trim($row[1]);
	       $md5Pass = md5($_POST['password']);	
               if ( $md5Pass == $trim) {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $_POST['username'];
                  
                  echo 'You have logged in';
   		  header('Refresh: 2; URL = home.php');
               }else {
                  $msg = 'Wrong username or password';
               }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
			
         Not a member? <a href = "signup.php" tite = "Logout">Signup.
         
      </div> 
      
   </body>
</html>
