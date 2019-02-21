<?php
session_start();
?>
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
		align-items: center;
		justify-content: center;
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
    
	<div class="tab">
  		<input type="button" name="home" value="Home"  onclick="location.href='home.php'">
		<input type="button" name="account" value="Account"  onclick="location.href='query.php'">
	
		<input type="button" name="dono" value="Donate"  onclick="location.href='dono.php'">
		<input type="button" name="logout" value="Logout"  onclick="location.href='logout.php'">
	</div>
    
    </head>
	<body>
	<h1>Add a Payment Method</h1>
	<div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "cardname" placeholder = "Card Name" 
              ></br>
            <input type = "text" class = "form-control"
               name = "cardNumber" placeholder = "Card Number" required></br>
	    <input type = "text" class = "form-control"
               name = "cardBack" placeholder = "CVV" required></br>
	    <input type = "text" class = "form-control"
               name = "expDate" placeholder = "Expiration Date" required></br></br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "add">Add</button>
         </form>
			
         
         <?php
	    
            $msg = '';
            
            if (isset($_POST['add']) && !empty($_POST['cardname']) 
               && !empty($_POST['cardNumber'])) {
	       $db = mysqli_connect('localhost','root','rockyou.txt-SUCKS!','DonationDatabase') or die ('Error connecting');
	       $name = $_POST['cardname'];
	       $query = "insert into payment(user,cardName,cardNumber,cardBack,expDate) values ('".$_SESSION['username']."','".$name."','".$_POST['cardNumber']."','".$_POST['cardBack']."','".$_POST['expDate']."')";
	       $result = mysqli_query($db, $query) or die('Error Adding Payment Method');
	       $row = mysqli_fetch_row($result);
               $trim = trim($row[1]);
	       $md5Pass = md5($_POST['password']);	
               echo "Method Successfully created. Taking you to your account page.";
	       header('Refresh: 2; URL = query.php');}

         ?>
      </div> 
	</body>
</html>
