<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$id = $_POST['id'];
	$classcode = $_POST['classcode'];
	$subjectcode = $_POST['subjectcode'];
	$time = $_POST['time'];
	$teacher = $_POST['teacher'];
		
	// checking empty fields
	if(empty($classcode) || empty($subjectcode) || empty($time) || empty($teacher)) {
				
		if(empty($classcode)) {
			echo "<font color='red'>Class Code field is empty.</font><br/>";
		}
		
		if(empty($subjectcode)) {
			echo "<font color='red'>Subject Code field is empty.</font><br/>";
		}
		if(empty($time)) {
			echo "<font color='red'>Time field is empty.</font><br/>";
		}
		if(empty($teacher)) {
			echo "<font color='red'>Teacher field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO tbl_class(classcode, subjectcode, time, teacher) VALUES(:classcode, :subjectcode, :time,:teacher)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':classcode', $classcode);
		$query->bindparam(':subjectcode', $subjectcode);
		$query->bindparam(':time', $time);
		$query->bindparam(':teacher', $teacher);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index2.php'>View Result</a>";
	}
}
?>
</body>
</html>
