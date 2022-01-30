<?php
include'Connect_HC.php';

$Name=$_POST['Name'];
$Last_Name=$_POST['Last_Name'];
$CNP=$_POST['CNP'];
$Phone_Number=$_POST['Phone_Number'];
$Programme=$_POST['Programme'];
		
		/*Check the number of clients scheduled for a specific programme
		-will use later to block the users into  making appointments over the room capacity : */
		
	$sql_Abs="SELECT `Programme_Type`,COUNT(*) as entries_Abs FROM `clients` WHERE `Programme_Type`='Abs';";//Check the number of clients scheduled for a specific programme (will use later to block the users into  making appointments over the room capacity
		
	$result=mysqli_query($connect,$sql_Abs);
				
		if(mysqli_num_rows($result)>0)
{
			While($row=mysqli_fetch_assoc($result))
	{
				$empty_spots_Abs=$row['entries_Abs'];	
	}
}		
	$sql_Kangoo_Jumps="SELECT `Programme_Type`,COUNT(*) as entries_Kangoo_Jumps FROM `clients` WHERE `Programme_Type`='Kangoo_Jumps';";
		
	$result=mysqli_query($connect,$sql_Kangoo_Jumps);
				
		if(mysqli_num_rows($result)>0)
{
			While($row=mysqli_fetch_assoc($result))
	{
				$empty_spots_Kangoo_Jumps=$row['entries_Kangoo_Jumps'];				
	}
}		
	$sql_Pilates="SELECT `Programme_Type`,COUNT(*) as entries_Pilates FROM `clients` WHERE `Programme_Type`='Pilates';";
		
	$result=mysqli_query($connect,$sql_Pilates);
				
		if(mysqli_num_rows($result)>0)
{
			While($row=mysqli_fetch_assoc($result))
	{
				$empty_spots_Pilates=$row['entries_Pilates'];
	}
}		
	$sql_Yoga="SELECT `Programme_Type`,COUNT(*) as entries_Yoga FROM `clients` WHERE `Programme_Type`='Yoga';";
		
	$result=mysqli_query($connect,$sql_Yoga);
				
		if(mysqli_num_rows($result)>0)
{
			While($row=mysqli_fetch_assoc($result))
	{
				$empty_spots_Yoga=$row['entries_Yoga'];
	}
}		
				
		if(isset($_POST['Send']))
	
{
		if(!preg_match("/^[a-zA-Z ]*$/",$_POST['Name'])||(strlen($_POST['Name']) < 3))//Verify if Name is correct
	{
			echo '<h4>Incorrect Name</h4>.<br>';
	die;
	} 
		else
{
			echo "<h4>Name: </h4>".$_POST['Name']. "<br>";
}
		if(!preg_match("/^[a-zA-Z ]*$/",$_POST['Last_Name'])||(strlen($_POST['Last_Name']) < 3))//Verify if Last Name is correct
{
			echo '<h4>Incorrect Last Name</h4>. <br>';
	die;
}
		else
{
	echo '<h4>Last name: </h4>'.$_POST['Last_Name']."<br>";
}
		if(preg_match("/^[a-zA-Z ]$/",$_POST['CNP'])|| (strlen($_POST['CNP'])<>13)) //Verify if CNP is correct
{
			echo "<h4>Incorrect CNP</h4>. <br>";
	die;
}
		else
{
			echo '<h4>CNP: </h4>'.$_POST['CNP']."<br>";
}

		if(preg_match("/^[a-zA-Z ]$/",$_POST['Phone_Number'])|| strlen($_POST['Phone_Number'])<>10) //Verify if Phone Number is correct
{
			echo "<h4>Incorrect Phone number</h4>. <br>";
	die;
}
		else
{
			echo '<h4>Phone number: </h4>'.$_POST['Phone_Number']."<br>";
}
		echo "<h5> Spots Abs </h5>".$empty_spots_Abs."<br>";
		echo "<h5> Spots Kangoo Jumps </h5>".$empty_spots_Kangoo_Jumps."<br>";
		echo "<h5> Spots Pilates </h5>".$empty_spots_Pilates."<br>";
		echo "<h5> Spots Yoga </h5>".$empty_spots_Yoga."<br>";	
		
		/*Using the number of clients we know from above function,
		we can tell if user can make an appointment at a certain programme,
		suggesting other programmes and stop from exceeding the room capacity : */
		
		if(isset($_POST['Programme']))  
		{
			echo '<h4>You selected </h4>'.$Programme."<br>";
		}
		if(($Programme)=='Abs'&&$empty_spots_Abs>=35)
		{
			echo "<h4>This programme is all booked up, Choose a different one.</h4>";
			die;
		}
		elseif(($Programme=='Kangoo_Jumps')&&$empty_spots_Kangoo_Jumps>=35)
		{
			echo "<h4>This programme is all booked up, Choose a different one.</h4>";
			die;
		}
		elseif(($Programme=='Pilates')&&$empty_spots_Pilates>=40)
		{
			echo "<h4>This programme is all booked up, Choose a different one.</h4>";
			die;
		}
		elseif(($Programme=='Yoga')&&$empty_spots_Yoga>=40)
		{
			echo "<h4>This programme is all booked up, Choose a different one.</h4>";
			die;
		}

		/* Inserting data into databases tables : */
		
	$Appointment="INSERT INTO `Clients`(CNP,Name,Last_Name,Phone_Number,Programme_Type)
	VALUES('$CNP','$Name','$Last_Name','$Phone_Number','$Programme')";
	
		if(mysqli_query($connect,$Appointment))
{
			echo '<h4>Appointment completed. </h4>';
}
		elseif(!mysqli_query($connect,$Appointment))
		{
			echo "<h4> Was'nt able to schedule an appointment </h4>"."<br>".mysqli_error($connect);
		}
}
		elseif((isset($_POST['Delete']))&&(!empty($_POST['CNP'])))
{
	$Appointment="DELETE FROM `Clients` WHERE CNP='$CNP'";

		if(mysqli_query($connect,$Appointment))
{
			echo "<h4>Appointment deleted</h4>"."<br>";
}
		else
			echo "<h4>Was'nt able to delete your appointment </h4>".mysqli_error($connect);
}
		mysqli_close($connect);

?>