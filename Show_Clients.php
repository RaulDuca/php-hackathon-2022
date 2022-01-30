<!DOCTYPE HTML>
<html>
	<head>
		<style>
			table,th,td {
				border: 1px solid black;
			}
		</style>
	</head>
	<body>
		<?php
		include 'Connect_HC.php';
		
		//Using PHP commands to show all clients in a table ordered by programme type - can be used any criteria
		
		$sql="SELECT * FROM `clients` ORDER BY `Programme_Type`;"; 
		
		$resultTable=(mysqli_query($connect,$sql));
		
		if(mysqli_num_rows($resultTable)>0)
		{
			echo"<table><tr>
			<th>CNP</th>
			<th>Name</th>
			<th>Last Name</th>
			<th>Phone Number</th>
			<th>Programme Type</th><tr>";
			
			While($row=mysqli_fetch_assoc($resultTable))
		{
			echo "<tr><td>".$row["CNP"]."</td>".
			"<td>".$row["Name"]."</td>".
			"<td>".$row["Last_Name"]."</td>".
			"<td>".$row["Phone_Number"]."</td>".
			"<td>".$row["Programme_Type"]."</td>.</tr>";
		}
			echo"</table>";
		}
		else
		{
			echo "No clients has scheduled an appointment";
		}
		mysqli_close($connect);
		
?>