<?php
$connection = mysqli_connect("localhost","root","");
if(!$connection)
{
	die("Database connection failed!");
	
}
$db_connect = mysqli_select_db($connection,"user-registration" );
if(!$db_connect)
{
	die("Database connection failed!".mysqli_error());
	
}
?>