<?php 
$pdo = new PDO("mysql:host=localhost;dbname=discound","root","");
//Delete
if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	$del_q = "DELETE FROM users WHERE id='$id'";
	$del_st = $pdo->prepare($del_q);
	$del_st->execute();
	header("location:index.php");
}
//Submit
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$number = $_POST['num'];
	//insert
	$q ="INSERT INTO users (name,number) VALUES('$name','$number')";
	$statement = $pdo->prepare($q);
	$statement->execute();
	echo "string";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Database Form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
	<div class="row">
		<div class="col-4 offset-4" style="padding-top: 200px;">
			<h3 class="text-center m-5 primary">Login Form</h3>
			
		<form class="form-group" method="POST" >
		<input class="form-control" type="text" name="name"><br>
		<input class="form-control" type="number" name="num"><br>
		<input class="btn btn-primary" type="submit" name="submit" value="Sent">
		</form>
<!-- Get Data -->

<?php 
	$get_data_sql = "SELECT * FROM users";
	$get_statement = $pdo->prepare($get_data_sql);
	$get_statement->execute();
	$result = $get_statement->fetchAll();
 ?>


		<table border="1" style="width:100%" class="text-center">
			<tr>
				<th>Name</th>
				<th>Number</th>
				<th>Action</th>
			</tr>

			<?php  
			foreach ($result as $value) {
				
			?>
			<tr>
				<td><?php echo $value['name']; ?></td>
				<td><?php echo $value['number']; ?></td>
				<td><a class="btn btn-danger btn-sm" href="?delete=<?php echo $value['id']; ?>">Delete</a>
				 <a class="btn btn-primary btn-sm" href="login.php?id=<?php  echo $value['id']; ?>">update</a></td>
			</tr>
		<?php  }
		 ?>
		</table>
		</div>
	</div>
</body>
</html>