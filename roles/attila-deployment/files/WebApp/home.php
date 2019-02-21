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
		align-items: center;
 																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																	justify-content: center;
display: flex;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
   		background-color: #ddd;
	}

	

	
</style>
    <head>
    <body>
	<div class="tab">
  		<input type="button" name="home" value="Home"  onclick="location.href='home.php'">
		<input type="button" name="account" value="Account"  onclick="location.href='query.php'">
		<input type="button" name="dono" value="Donate"  onclick="location.href='dono.php'">
		<input type="button" name="logout" value="Logout"  onclick="location.href='logout.php'">
		<?php
		echo $_SESSION['username'];
		?>
	</div>
	
	<h1 style="text-align:center"> Hackistan Election </h1>
        <h3 style="text-align:center">Donate to the Campagain </h3>
	<div style="text-align:center">
    	
	</div>
	<p style="text-align:center">This page is dedicated to giving money to candidates for the upcoming 2019 Hackistan election. Your money will go towards furthering our ideals, promoting candidates of a like mind, and making sure opponents who will be a detriment to our country are not elected. Just link your credit card, specify the amount, and our country will be better because of it. 
<p style="text-align:center">
<p style="text-align:center">If you can't donate, you cans till help out the cause! Make sure to get out and vote as weel as talk to your friends, family, neighbors and colleagues. Try to convince them of the best path for our country's future!
      
	</body>
<html>
