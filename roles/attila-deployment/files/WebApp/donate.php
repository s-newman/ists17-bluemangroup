<?php
	session_start();
	$amount = $_POST["amount"];
	$user = $_SESSION['username'];
	$method = $_POST["select"];
	if($method == "0"){
	echo "Please select a valid payment method.<br>You may need to add one.";
	header('Refresh: 2; URL = dono.php');
	
	}
else{
	$db = mysqli_connect('localhost','root','rockyou.txt-SUCKS!','DonationDatabase') or die ('Error connecting');
	$query = "insert into Donations(username,amount,method) values ('".$user."','".$amount."','".$method."')";
	$queryInc = "Update Users set NumOfDonations = NumOfDonations + 1 where user = '".$user."';";
	$queryAdd = "Update Users set Amount = Amount + ".$amount." where user = '".$user."';";
	mysqli_query($db,$queryAdd);
	mysqli_query($db,$queryInc);
	if (mysqli_query($db,$query)) {
    echo "You have successfully donated $".$amount;
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($db);
}
	header('Refresh: 2; URL = dono.php');}
	?>
