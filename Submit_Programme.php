<?php
include'Connect_HC.php';

		if (!isset($_POST['Prog']))
{
			echo "<h4>Choose a programme you wish to add</h4>"."<br>";

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
		echo "<h4>You selected </h4>".$_POST['Prog']."<br>";
		
		//Inserting data into databases tables
		
	$Rooms="INSERT INTO `Rooms`(Room_Number,Programme_Type,Room_Capacity)
	VALUES('$Room_Number','$Selected_Programme','$Room_Capacity')";
	
		if(!mysqli_query($connect,$Rooms))
{
			echo "<h4>Programme not added </h4>".mysqli_error($connect);
}
		else
			echo "<h4>Programme added to timetable </h4>";
			echo "<br>";

?>