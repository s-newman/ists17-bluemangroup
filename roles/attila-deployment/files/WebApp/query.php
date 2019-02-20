<?php
session_start();
function getRecords(){
	$db = mysqli_connect('localhost','root','rockyou.txt-SUCKS!','DonationDatabase') or die ('Error connecting');
	$query = "Select * from Users;";
	$result = mysqli_query($db, $query) or die('Error Querying');
	
	while ($row = mysqli_fetch_array($result)){
    		echo $row['user'] . ' ' . $row['password'] . ': ' . $row['NumOfDonations'] . ' ' .$row['Amount'] .'<br/>';
        echo $_SESSION['username'];
}
	
}
	    
?>
<script>
function getRecords(elmnt){
  alert("<?PHP getRecords(); ?>");
  elmnt.style.color = 'red';
}
</script>

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
    
	<div class="tab">
  		<input type="button" name="home" value="Home"  onclick="location.href='home.php'">
		<input type="button" name="account" value="Account"  onclick="location.href='query.php'">
	
		<input type="button" name="dono" value="Donate"  onclick="location.href='dono.php'">
		<input type="button" name="logout" value="Logout"  onclick="location.href='logout.php'">
	</div>
    
    </head>
    <body>
	<h1> Account Information </h1>
        <?php
            echo "Username: ".$_SESSION['username'].'<br/>';
            $db = mysqli_connect('localhost','root','rockyou.txt-SUCKS!','DonationDatabase') or die ('Error connecting');
	$queryUser = "Select * from Users where user = '".$_SESSION['username']."';";
	$resultUser = mysqli_query($db,$queryUser);
	while ($rowU = mysqli_fetch_array($resultUser)){
		echo "Number of Donations: ".$rowU['NumOfDonations']."</br>Total Amount Donated: $".$rowU['Amount'].'</br>';
	}
	$query = "Select * from Donations where username = '".$_SESSION['username']."';";
	$result = mysqli_query($db, $query) or die('Error Querying');
	echo "<h3>Transactions:</h3>";
	while ($row = mysqli_fetch_array($result)){
    		echo "Transaction ID: ".$row['TransactionID'] . " Amount: ". $row['amount'].'<br/>';
	
}
	$queryMeth = "Select cardName from payment where user = '".$_SESSION['username']."';";
	$queryAdmin = "Select * from Users where user = '".$_SESSION['username']."';";
	$resultMeth  = mysqli_query($db, $queryMeth) or die('Error Getting Methods');
	echo "<h3>Payment Methods:</h3>";
	
	while ($rowMeth = mysqli_fetch_array($resultMeth)){
    		echo $rowMeth['cardName'].'<br/>';
	
}
	$resultAdmin = mysqli_query($db, $queryAdmin) or die('Error Querying');
	$rowAdmin = mysqli_fetch_array($resultAdmin);
	if ($rowAdmin['admin']==1){
		?>
		</br>
		<input type="button" name="adminPage" value="Admin Page"  onclick="location.href='admin.php'">

		<?php


		}
         ?>
	<form>
	<br>
<input type="button" value="Add a Payment Method" onclick="window.location.href='http://localhost/payment.php'" />
</form>
    </body>
</html>
