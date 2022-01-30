<?php
include'Connect_HC.php';

$Name=$_POST['Name'];
$Last_Name=$_POST['Last_Name'];
$CNP=$_POST['CNP'];
$Phone_Number=$_POST['Phone_Number'];
$Programme=$_POST['Programme'];
		
	$sql_Abs="SELECT `Programme_Type`,COUNT(*) as entries_Abs FROM `clients` WHERE `Programme_Type`='Abs';";
		
	$result=mysqli_query($connect,$sql_Abs);
				
		if(mysqli_num_rows($result)>0)
{
			While($row=mysqli_fetch_assoc($result))
	{
				$empty_spots_Abs=$row['entries_Abs'];
				
				echo " Spots Abs ".$empty_spots_Abs."<br>";
	}
}		
	$sql_Kangoo_Jumps="SELECT `Programme_Type`,COUNT(*) as entries_Kangoo_Jumps FROM `clients` WHERE `Programme_Type`='Kangoo_Jumps';";
		
	$result=mysqli_query($connect,$sql_Kangoo_Jumps);
				
		if(mysqli_num_rows($result)>0)
{
			While($row=mysqli_fetch_assoc($result))
	{
				$empty_spots_Kangoo_Jumps=$row['entries_Kangoo_Jumps'];
				
				echo " Spots Kangoo Jumps ".$empty_spots_Kangoo_Jumps."<br>";
	}
}		
	$sql_Pilates="SELECT `Programme_Type`,COUNT(*) as entries_Pilates FROM `clients` WHERE `Programme_Type`='Pilates';";
		
	$result=mysqli_query($connect,$sql_Pilates);
				
		if(mysqli_num_rows($result)>0)
{
			While($row=mysqli_fetch_assoc($result))
	{
				$empty_spots_Pilates=$row['entries_Pilates'];
				
				echo " Spots Pilates ".$empty_spots_Pilates."<br>";
	}
}		
	$sql_Yoga="SELECT `Programme_Type`,COUNT(*) as entries_Yoga FROM `clients` WHERE `Programme_Type`='Yoga';";
		
	$result=mysqli_query($connect,$sql_Yoga);
				
		if(mysqli_num_rows($result)>0)
{
			While($row=mysqli_fetch_assoc($result))
	{
				$empty_spots_Yoga=$row['entries_Yoga'];
				
				echo " Spots Yoga ".$empty_spots_Yoga."<br>";
	}
}		
		
		
		if(isset($_POST['Send']))
	
{
		if(!preg_match("/^[a-zA-Z ]*$/",$_POST['Name'])||(strlen($_POST['Name']) < 3))

	{
		
	echo 'Name field not suited. <br>';

	} 
		else
{
	echo "Name: ".$_POST['Name']. "<br>";
}
		if(!preg_match("/^[a-zA-Z ]*$/",$_POST['Last_Name'])||(strlen($_POST['Last_Name']) < 3))
{
	echo 'Last name field not suited. <br>';
}
		else
{
	echo 'Last name: '.$_POST['Last_Name']."<br>";
}
		if(preg_match("/^[a-zA-Z ]$/",$_POST['CNP'])|| (strlen($_POST['CNP'])<>13))
{
	echo "Incorrect CNP. <br>";
	die;
}
		else
{
	echo 'CNP: '.$_POST['CNP']."<br>";
}

		if(preg_match("/^[a-zA-Z ]$/",$_POST['Phone_Number'])|| strlen($_POST['Phone_Number'])<>10)
{
	echo "Incorrect Phone number. <br>";
	die;
}
		else
{
	echo 'Phone number: '.$_POST['Phone_Number']."<br>";
}
		
		if($_POST['Programme']='Abs'&&$empty_spots_Abs<=5)
		{
	echo "You selected ".$_POST['Programme']."<br>";
		}

	$Clients="INSERT INTO `Clients`(CNP,Name,Last_Name,Phone_Number,Programme_Type)
	VALUES('$CNP','$Name','$Last_Name','$Phone_Number','$Programme')";
	
		if(mysqli_query($connect,$Clients))
{
	echo "Appointment scheduled. ";
}
		elseif(!mysqli_query($connect,$Clients))
		{
	echo "Was'nt able to schedule an appointment ".mysqli_error($connect);

	echo "<br>";
		}
}
		elseif((isset($_POST['Delete']))&&(!empty($_POST['CNP'])))

{
	$Appointment="DELETE FROM `Clients` WHERE CNP='$CNP'";

		if(mysqli_query($connect,$Appointment))
{
	echo "Appointment deleted"."<br>";
}
		else
	echo "Was'nt able to delete your appointment ".mysqli_error($connect);
}
		

		mysqli_close($connect);



?>