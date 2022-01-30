<?php
include'Connect_HC.php';

$TableRooms="CREATE TABLE `Rooms`
	(`Room_Number` INT(10) NOT NULL,
	`Programme_Type` VARCHAR (25) PRIMARY KEY NOT NULL,
	`Room_Capacity` INT (10) NOT NULL)";
	
if(mysqli_query($connect,$TableRooms))
{
	echo "Rooms Table has been created";
	
echo "<br>";
}
	else
		echo "Was'nt able to create Rooms Table".mysqli_error($connect);
	
echo"<br>";

$TableClients="CREATE TABLE `Clients`
	(`CNP` VARCHAR(13) PRIMARY KEY NOT NULL,
	`Name` VARCHAR (25) NOT NULL,
	`Last_Name` VARCHAR (25) NOT NULL,
	`Phone_Number` INT (10) NOT NULL,
	`Programme_Type` VARCHAR (25) NOT NULL,
	FOREIGN Key (`Programme_Type`) REFERENCES `Rooms`(`Programme_Type`) ON DELETE SET NULL)";
	
if(mysqli_query($connect,$TableClients))
{
	echo "Clients Table has been created";
	
echo "<br>";
}
else
	echo"Was'nt able to create Clients Table".mysqli_error($connect);

echo "<br>";
	

mysqli_close($connect);

?>