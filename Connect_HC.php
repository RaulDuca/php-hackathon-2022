<?php
$servername="localhost";
$username="root";
$password="";
$database="Health_Center";
$connect=mysqli_connect($servername,$username,$password,$database);//connecting to server /* ,$database */


	if($connect)
{
	echo "Connected to Database"."<br><br>";
}
	else
	die ("Not connected"."<br>".mysqli_connect_error());

/* $Create_DB_HC="CREATE DATABASE `Health_Center`";
	if(mysqli_query($connect,$Create_DB_HC))//creating DB
{
	echo "Database created"."<br>";
}
	else
{
	echo "Database not created"."<br>".mysqli_error($connect);
} 

mysqli_close($connect); */

/* Before creating the database comment $database, after creating uncomment the parameter*/

?>