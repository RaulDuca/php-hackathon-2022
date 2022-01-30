<?php
include'Connect_HC.php';

if (!isset($_POST['Prog']))
{
		echo "Choose a programme you wish to add"."<br>";

		die;
}
	else
		$Selected_Programme=$_POST["Prog"];
		$Room_Number=[];
		$Programme_Type=[];
		$Room_Capacity=[];
			SWITCH($Selected_Programme)
		{
			case "Abs":
			$Room_Number='2';$Programme_Type='Abs';$Room_Capacity=35;
			break;
						
			case "Kangoo_Jumps":
			$Room_Number='2';$Programme_Type='Kangoo_Jumps';$Room_Capacity=35;
			break;
						
			case "Pilates":
			$Room_Number='1';$Programme_Type='Pilates';$Room_Capacity=40;
			break;
					
			case "Yoga":
			$Room_Number='1';$Programme_Type='Yoga';$Room_Capacity=40;
			break;
		}	
		echo "You selected ".$_POST['Prog']."<br>";

$Selected_Programme=$_POST['Prog'];

$Rooms="INSERT INTO `Rooms`(Room_Number,Programme_Type,Room_Capacity)
	VALUES('$Room_Number','$Selected_Programme','$Room_Capacity')";
	
if(!mysqli_query($connect,$Rooms))
{
		echo "Programme not added ".mysqli_error($connect);
}
	else
		echo "Programme added to timetable ";
		echo "<br>";

/* if(isset($_POST['delete_prog']))
{
	$delete_programme="DELETE FROM `rooms` WHERE Programme_Type='$Selected_Programme'";
	
		if(mysqli_query($connect,$delete_programme))
		{
			echo "Programme removed from timetable ";
			die;
		}
}
else
	echo "Was'nt able to delete programme from timetable ".mysqli_error($connect); */

?>