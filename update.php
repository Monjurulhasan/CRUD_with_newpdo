<?php 
	$id = $_GET['id'];
	$con = new PDO('mysql:host=localhost;dbname=femily', 'root', '');
	$statement = $con->prepare('select * from friends where id=:id');
	$statement->execute([':id' => $id]);
	$friends = $statement->fetch(PDO::FETCH_OBJ);
	
	if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['age'])) {
		$statement = $con->prepare('update friends set name=:name, address=:address, age=:age where id=:id');
		$statement->execute([
			':name' => $_POST['name'],
			':address' => $_POST['address'],
			':age' => $_POST['age'],
			':id' => $id
		]);
	header("Location: /");
	}
 ?>
<?php require 'header.php'; ?>
<div class="container">
	<div class="card">
		<div class="card-header">
			<h3>Update Friends</h3>
		</div>
		<div class="card-body">
			<form action="" method="post">
				<div class="form-group">
					<label for="name">Name:</label>
					<input value="<?php echo $friends->name ?>" type="text" name="name" id="name" class="form-control"> 
				</div>
				<div class="form-group">
					<label for="address">Address:</label>
					<input value="<?php echo $friends->address ?>" type="text" name="address" id="address" class="form-control">
				</div>
				<div class="form-gorup">
					<label for="age">Age:</label>
					<input value="<?php echo $friends->age ?>" type="int" name="age" id="age" class="form-control">
				</div>
				<button class="btn btn-outline-success mt-3">Update Friends</button>
			</form>
		</div>
	</div>
</div>
<?php require 'footer.php'; ?>