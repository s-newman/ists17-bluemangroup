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
		align-items: center;
display: flex;
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
	<h1> Donations </h1>
	<form action="donate.php" method="post">
	Amount: <input type="text" name="amount">
	<?php
	$db = mysqli_connect('localhost','root','rockyou.txt-SUCKS!','DonationDatabase') or die ('Error connecting');
	$query = "Select cardName,ID from payment where user = '".$_SESSION['username']."';";
	$result = mysqli_query($db, $query) or die('Error Querying');
	
		$select= '<select name="select" id="select" size="1">';
		$select .='<option value = "0">Select a Payment Method</option>';
		while($rs=mysqli_fetch_array($result)){
			$name = $rs['cardName'];
			$ID = $rs['ID'];
      			$select.='<option value="'.$name.'">'.$name.'</option><br>';

  		}
	
	$select.='</select><br><br>';
	echo $select;
	
		
	
	?>
	<br>
	<input type="submit" value="Donate">
	</form>

	
	</body>
<html>

