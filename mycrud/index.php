<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT * FROM tbl_student ORDER BY studentid DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Add New Data</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Gender</td>
		<td>Birth Date</td>
		<td>Address</td>
		<td>Contact</td>
		<td>Update</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['lname']."</td>";
		echo "<td>".$row['gender']."</td>";	
		echo "<td>".$row['birthdate']."</td>";	
		echo "<td>".$row['address']."</td>";
		echo "<td>".$row['contact']."</td>";
		echo "<td><a href=\"edit.php?id=$row[studentid]\">Edit</a> | <a href=\"delete.php?id=$row[studentid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
