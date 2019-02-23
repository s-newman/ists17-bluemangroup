<?php
	$db = mysqli_connect('localhost','root','rockyou.txt-SUCKS!','DonationDatabase') or die ('Error connecting');
	$user = $_POST['username'];
	$password = md5($_POST['password']);
	$query = "select * from Users where username ='".$user."')" ;
	$result = mysqli_query($db,$query);
	if(empty($result)){
		$query2 = "insert into Users(user,password,NumOfDonations,Amount) values ('".$user."','".$password."','0','0')";
		$result2 = mysqli_query($db,$query2);
		echo "Account created! Taking you to the login page";
		header('Refresh: 2; URL = login.php');
	}else{
		echo "Username already exists";
		header('Refresh: 2; URL = signup.php');
	}
	?>
