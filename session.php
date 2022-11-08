<?php
	$con = mysqli_connect("localhost", "root", "", "user-registration");

	session_start();

	$user_check = $_SESSION['login_user'];

	$query = "SELECT username from visitors where username = '$user_check'";
	$ses_sql = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($ses_sql);
	$login_session = $row['username'];
?>
