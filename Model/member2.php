<?php
session_start();
$error = '';
if(isset($_POST['submit'])) {
if(empty($_POST['username']) || empty($_POST['password'])) {
$error ="Please fill in the required fields.";
}
	else
		{
		$username = $_POST['username'];
		// $password = md5($_POST['password']);
		$password = $_POST['password'];
		$con = mysqli_connect("localhost", "root","", "user-registration");
		$query = "SELECT username, password from `administrator` where username=? AND password=? LIMIT 1";
		$stmt = $con->prepare($query);
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();
		$stmt->bind_result($username, $password);
		$stmt->store_result();
		if($stmt->fetch())
			{
				$_SESSION['login_user'] = $username;
				header("location: ../admin/dashboard.php");
			}
			else{
					$error = "Incorrect Username or Password. Please try again.";
				}
			mysqli_close($con);
		}
	}
 ?>