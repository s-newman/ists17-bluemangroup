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
		lign-items: center;																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																															justify-content: center;
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
	<h1> Admin Page </h1>
	<h3>Current users</h3>
	<?php
$db = mysqli_connect('localhost','root','rockyou.txt-SUCKS!','DonationDatabase') or die ('Error connecting');
	$query = "Select * from Users;";
	$result = mysqli_query($db, $query) or die('Error Querying');
	
	while ($row = mysqli_fetch_array($result)){
    		echo $row['user'] . ': ' . $row['NumOfDonations'] . ' ' .$row['Amount'] .'<br/>';
        
}
	?>
	<h3> Make user an Admin </h3>
	<form class = "form-makeAdmin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" ></br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Make Admin</button>
         </form>
	<?php
	    
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) ) {
	       $db = mysqli_connect('localhost','root','rockyou.txt-SUCKS!','DonationDatabase') or die ('Error connecting');
	       $name = $_POST['username'];
	       $query = "Update Users set admin='1' where user='$name';";
	       $result = mysqli_query($db, $query) or die('Invalid User');
                  echo 'User updated';
   		  header('Refresh: 2; URL = admin.php');
            
            }
         ?>
	<h3>View User Records</h3>
        <form class = "form-getRecords" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" ></br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "getRecords">Get Records</button>
         </form>
	<?php
            if (isset($_POST['getRecords']) && !empty($_POST['username']) ) {
	       $db = mysqli_connect('localhost','root','rockyou.txt-SUCKS!','DonationDatabase') or die ('Error connecting');
		$query = "Select * from Donations where username = '".$_POST['username']."';";
		$result = mysqli_query($db, $query) or die('Error Querying');
		echo "<h3>Records for ".$_POST['username']."</h3><br>";
		echo "<h4>Transactions:</h4>";
		while ($row = mysqli_fetch_array($result)){
    			echo "Transaction ID: ".$row['TransactionID'] . " Amount: ". $row['amount'].'<br/>';
		}
	

	$queryMeth = "Select cardName from payment where user = '".$_POST['username']."';";
	$resultMeth  = mysqli_query($db, $queryMeth) or die('Error Getting Methods');
	echo "<h4>Payment Methods:</h4>";
	
	while ($rowMeth = mysqli_fetch_array($resultMeth)){
    		echo $rowMeth['cardName'].'<br/>';
	}	
}
         ?>
    </body>
</html>
