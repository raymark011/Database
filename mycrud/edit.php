<?php
// including the database connection file
include_once("config.php");
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name=$_POST['name'];
	$description=$_POST['description'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	
	// checking empty fields
	if(empty($name) || empty($description) || empty($price) || empty($quantity)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		if(empty($quantity)) {
			echo "<font color='red'>Quantity field is emply.</font><br/>";
		}
	} else {	
		//updating the table
		$sql = "UPDATE product SET name=:name, description=:description, price=:price, quantity=:quantity WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':name', $name);
		$query->bindparam(':description', $description);
		$query->bindparam(':price', $price);
		$query->bindparam(':quantity',$quantity);
		$query->execute(array(':id' => $id, ':name' => $name, ':description' => $description, ':price' => $price, ':quantity' => $quantity));
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
//selecting data associated with this particular id
$sql = "SELECT * FROM product WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));
while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$name = $row['name'];
	$description = $row['description'];
	$price = $row['price'];
	$quantity = $row['quantity'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Description</td>
				<td><input type="text" name="description" value="<?php echo $description;?>"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr>r 
				<td>quantity</td>
				<td><input type="text" name="quantity" value="<?php echo $quantity;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>