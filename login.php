<?php 
$pdo = new PDO("mysql:host=localhost;dbname=discound","root","");
$del_id = $_GET['id'];
/*Update*/
if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$number = $_POST['num'];
	$q = "UPDATE users SET name='$name',number='$number' WHERE id='$del_id'";
	$statement = $pdo->prepare($q);
	$statement->execute();
	header("location:index.php");
}
/*GET DATA*/
	$get_data_sql = "SELECT * FROM users WHERE id='$del_id'";
	$get_statement = $pdo->prepare($get_data_sql);
	$get_statement->execute();
	$result = $get_statement->fetchAll();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Update</title>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 </head>
 <body style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
 
<?php foreach ($result as $value) { ?>

<div class="col-4 offset-4" style="padding-top: 200px;">
<form class="form-group" method="POST" >
		<input class="form-control" type="text" name="name" 
		value="<?php echo $value['name'] ?>"><br>
		<input class="form-control" type="number" name="num"
		value="<?php echo $value['number'] ?>"
		><br>
		<input class="btn btn-primary" type="submit" name="submit" value="Update">
		</form>
<?php } ?>
</div>
 </body>
 </html>